<?php
namespace App\Model;

use App\Model\BasicModel;


/**
 * Description of Usuario
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Usuario extends BasicModel
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    
    public function getUsuarioByUsername( $username )
    {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE username = : username");
        $statement->bindParam(':username', $username, \PDO::PARAM_STR );
        $statement->execute();
        if( $statement->rowCount() > 0  ){
            return $statement->fetch( \PDO::FETCH_OBJ );
        }else{
            return false;
        }
    }
}
