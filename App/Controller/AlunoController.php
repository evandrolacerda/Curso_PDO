<?php

namespace App\Controller;

use App\Controller\BasicController;
use App\Database\Conexao;
use App\Model\Aluno;

/**
 * Description of AlunoController
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class AlunoController extends BasicController
{

    private $connection;
    private $model;

    public function __construct()
    {
        parent::__construct();
        $connObj = new Conexao();
        $this->connection = $connObj->getConnection();
        $this->model = new Aluno($this->connection);
    }

    public function listarAction()
    {
        $registros = $this->model->findAll();
        $this->view->addAttribute('registros', $registros);
        return $this->view->render('aluno/listar');
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $this->view->addAttribute('aluno', $this->model->find($id));

        return $this->view->render('aluno/editar');
    }

    public function editarPost()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_INT);

        if (!$id || !$nome || !$nota) {
            $_SESSION['erros'][] = "Preencha todos os  Campos";
            header('Location: /editar?id=' . $id);
        } else {
            try {
                $data = ['nome' => $nome, 'nota' => $nota];
                $this->model->update($id, $data);
                header('Location: / ');
            } catch (\PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }
    
    public function show()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        
        $aluno = $this->model->find($id);        
        
        $this->view->addAttribute('aluno', $aluno );
        
        return $this->view->render('aluno/show');        
    }
    
    public function deletar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        
        $aluno = $this->model->find($id);        
        
        $this->view->addAttribute('aluno', $aluno );
        
        return $this->view->render('aluno/excluir');        
    }
    
    public function deletarPost()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);        
        try{
            $this->model->delete($id);
            
            header('Location: / ');
        } catch (\PDOException $ex) {
            $_SESSION['erros'][] = $ex->getMessage();
            header('Location: / ');            
        }
    }
    
    public function inserir( )
    {
        return $this->view->render('aluno/inserir');
    }
    
    public function inserirPost( )
    {
        
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_INT);

        if (!$nome || !$nota) {
            $_SESSION['erros'][] = "Preencha todos os  Campos";
            header('Location: /inserir' );
        } else {
            try {
                $data = ['nome' => $nome, 'nota' => $nota];
                $this->model->insert(['nome', 'nota'], $data );
                header('Location: / ');
            } catch (\PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }

}
