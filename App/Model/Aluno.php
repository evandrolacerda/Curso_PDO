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
}
