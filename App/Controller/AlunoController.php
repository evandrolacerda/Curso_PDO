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

        
        //muda o layout do básico para o layout manager
        
        $this->view->setLayout('manager');
        $this->view->addAttribute('aluno', $this->model->find($id));
        return $this->view->render('admin/aluno/editar');
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
                $_SESSION['status'] = 'Registro atualizado com sucesso!';
                header('Location: /admin');
            } catch (\PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }
    
    public function exibir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        
        $aluno = $this->model->find($id);        
        
        $this->view->addAttribute('aluno', $aluno );
        
        return $this->view->render('aluno/show');        
    }
    
    public function show()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        
        $aluno = $this->model->find($id);        
        
        $this->view->addAttribute('aluno', $aluno );
        $this->view->setLayout('manager');
        
        return $this->view->render('admin/aluno/show');        
    }
    
    public function deletar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);        
        
        $aluno = $this->model->find($id);        
        
        $this->view->setLayout('manager');
        
        $this->view->addAttribute('aluno', $aluno );
        
        return $this->view->render('admin/aluno/excluir');        
    }
    
    public function deletarPost()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);        
        try{
            $this->model->delete($id);
            $_SESSION['status'] = 'Registro deletado com sucesso!';
            header('Location: /admin ');
        } catch (\PDOException $ex) {
            $_SESSION['erros'][] = $ex->getMessage();
            header('Location: /admin ');            
        }
    }
    
    public function inserir( )
    {
        $this->view->setLayout('manager');
        return $this->view->render('admin/aluno/inserir');
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
                $_SESSION['status'] = 'Registro inserido com sucesso!';
                header('Location: /admin ');
            } catch (\PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }
    
    public function busca()
    {
        $nome = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING );
        $registros = $this->model->findByName($nome);
        
        $this->view->setLayout('manager');
        $this->view->addAttribute('registros', $registros);
        return $this->view->render('admin/aluno/index');
    }
    
    public function adminIndex()
    {
        $registros = $this->model->findAll();
        $this->view->setLayout('manager');
        $this->view->addAttribute('registros', $registros);
        return $this->view->render('admin/aluno/index');
    }
}
