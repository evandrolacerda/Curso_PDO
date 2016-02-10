<?php
namespace App\Model;

use App\Model\BasicModel;
/**
 * Description of Aluno
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Aluno extends BasicModel
{
    
    protected $primaryKey = 'id';
    protected $table = 'alunos';
    
    
    public function __construct( \PDO $connection )
    {
        $this->connection = $connection;
                
    }
    
    public function findByName( $nome )
    {
        $registros = array();
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE nome LIKE :nome");
        
        try {
            $statement->bindValue( ':nome', "%$nome%", \PDO::PARAM_STR );
            $statement->execute();
            
            while ($row = $statement->fetch(\PDO::FETCH_OBJ)) {
                $registros[] = $row;
            }
            
            return $registros;
        } catch (\PDOException $exc) {
            throw new \Exception('Erro ao executar find(): ' . $exc->getMessage());
        }
    }
}
