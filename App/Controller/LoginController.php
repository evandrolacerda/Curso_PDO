<?php

namespace App\Controller;

use App\Controller\BasicController;
use App\Database\Conexao;

/**
 * Description of LoginController
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class LoginController extends BasicController
{

    private $connection;
    private $model;
    private $loginObject;

    public function __construct()
    {
        parent::__construct();
        $connObj = new Conexao();
        $this->connection = $connObj->getConnection();
        $this->loginObject = new \App\Util\Login($this->connection);
        $this->model = new \App\Model\Usuario($this->connection);
    }

    public function doLogin()
    {
        return $this->view->render('login/login_form');
    }

    public function logar()
    {
        $username = filter_input( INPUT_POST, 'usuario', FILTER_SANITIZE_STRING );
        $senha = filter_input( INPUT_POST, 'senha', FILTER_SANITIZE_STRING );
        
        try {
            if( $this->loginObject->logar( $username, $senha )){
                if( $this->loginObject->userMustChangePassword() === true ){
                    $_SESSION['erros'][] = "Você deve mudar sua senha.\n Utilize o formulário abaixo.";
                    header('Location: /senhaUsuario?id='. $_SESSION['username']->id );
                }else{
                    header('Location: /admin');
                }
                
            }else{
                $_SESSION['erros'][] = "Erro: ao fazer login";
                header('Location: /login/doLogin');
            }
                              
        } catch (\Exception $exc) {
            $_SESSION['erros'][] = "Erro: {$exc->getMessage() }";
            header('Location: /login');
        }             
    }
    
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

}
