<?php

namespace App\Util;

/**
 * Description of Login
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Login
{

    private $connection;

    public function __construct( \PDO $connection)
    {
        $this->connection = $connection;
    }

    
    public function logar($username, $senha)
    {
        try {
            $statement = $this->connection->prepare("SELECT * "
                    . "FROM usuarios WHERE username = ?");


            $statement->bindValue(1, $username, \PDO::PARAM_STR);

            $statement->execute();

            if ($statement->rowCount() == 0) {
                throw new \Exception('Usuário não existente!');
            } else {
                $usuario = $statement->fetch(\PDO::FETCH_OBJ);
                
             
                if ( password_verify($senha, $usuario->senha) !== false) {
                    $_SESSION['username'] = $usuario;
                    $_SESSION['authorized'] = true;
                    
                    return true;
                    
                } else {
                    throw new \Exception('Senha Incorreta');
                }
            }
        } catch (Exception $ex) {
            throw new \Exception('Erro ao efetuar login ' . $ex->getMessage());
        }
    }
    
    
    public function userMustChangePassword()
    {
        echo '<pre>';
        var_dump( $_SESSION['username'] );
        echo '</pre>';
        return ($_SESSION['username']->must_change_password == 1) ? true : false;
            
    }

    
    
    public function isLoged()
    {
        if (( isset($_SESSION['username']) && isset($_SESSION['authorized']) ) && ($_SESSION['authorized']) == true) {
            return true;
        } else {
            return false;
        }
    }

    
    
    public function logout($urlDestino)
    {
        unset($_SESSION['username']);
        unset($_SESSION['authorized']);
        session_destroy();
        
        header("Location: {$urlDestino}");
    }

}
