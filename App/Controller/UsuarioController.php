<?php

namespace App\Controller;

use App\Controller\BasicController;
use App\Model\Usuario;
use App\Database\Conexao;

/**
 * Description of UsuarioController
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class UsuarioController extends BasicController
{

    private $connection;
    private $model;

    public function __construct()
    {
        parent::__construct();
        $connObj = new Conexao();
        $this->connection = $connObj->getConnection();
        $this->model = new Usuario($this->connection);
    }

    public function index()
    {
        $this->view->setLayout('manager');
        $this->view->addAttribute('registros', $this->model->findAll());
        return $this->view->render('admin/usuario/index');
    }

    /**
     * Retorna o formulário para editar o usuário
     * Usuários ADM podem editar o registro de qualquer usuário
     * Usuários comuns só podem editar o próprio registro
     * 
     */
    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        if (( $id !== (int) $_SESSION['username']->id ) && (int) $_SESSION['username']->admin !== 1) {
            $_SESSION['erros'][] = "Você não tem permissão para editar esse registro!";
            header('Location: /usuario');
        } else {
            $usuario = $this->model->find($id);
            
            if(!$usuario){
                $_SESSION['erros'][] = "Usuário Não encontrado!";
                header('Location: /usuario');
            }
            $this->view->setLayout('manager');
            $this->view->addAttribute('usuario', $usuario);
            return $this->view->render('admin/usuario/editar');
        }
    }

    public function editarPost()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if (( $id !== (int) $_SESSION['username']->id ) && (int) $_SESSION['username']->admin !== 1) {
            $_SESSION['erros'][] = "Você não tem permissão para editar esse registro!";
            header('Location: /usuario');
        } else {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha');
            $senhaConfirmarcao = filter_input(INPUT_POST, 'confirme_senha');
            
            //somente um administrador pode tornar um usuário administrador
            //Admin defalult 0
            $admin = 0;

            if (!$nome) {
                $_SESSION['erros'][] = "O Campo nome é obrigatório";
                header('Location: /editarUsuario?id=' . $id );
                exit();
            }
            if (!$username) {
                $_SESSION['erros'][] = "O Campo username é obrigatório";
                header('Location: /editarUsuario?id=' . $id );
                exit();
            }
            if (!$senha) {
                $_SESSION['erros'][] = "O Campo senha é obrigatório";
                header('Location: /editarUsuario?id=' . $id );
                exit();
            }
            if ($admin === false) {
                $_SESSION['erros'][] = "O Campo admin é obrigatório";
                header('Location: /editarUsuario?id=' . $id );
                exit();
            }

            try {
                if ($senha !== $senhaConfirmarcao) {
                    $_SESSION['erros'][] = "Senha e confirmação de senhas devem ser iguais!";
                    header('Location: /editarUsuario?id=' . $id );
                    exit();
                }
                
                $deveMudarSenha = 0;
                $mensagemStatus = 'Registro atualizado com sucesso!';
                
                if( (int) $_SESSION['username']->admin === 1  && (int) $_SESSION['username']->id !== $id ){
                    $deveMudarSenha = 1;
                    $mensagemStatus = "Registro Atualizado com sucesso! O Usuário deverá mudar a senha no próximo Login";
                    //caso o usuário seja um administrador então o campo admin do form é considerado
                    $admin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_INT);
                }


                $data = [
                    'nome' => $nome,
                    'username' => $username,
                    'senha' => password_hash($senha, PASSWORD_DEFAULT),
                    'admin' => (int) $admin,
                    'must_change_password' => $deveMudarSenha
                ];



                $this->model->update($id, $data );

                $_SESSION['status'] = $mensagemStatus;
                header('Location: /usuario');
            } catch (\PDOException $exc) {
                $_SESSION['erros'][] = "Erro: {$exc->getMessage()}";
                header('Location: /inserirUsuario');
            }
        }
    }

    /**
     * 
     * somente adm podem deletar usuários
     */
    public function delete()
    {

        if ($_SESSION['username']->admin != 1) {
            $_SESSION['erros'][] = "Somente usuários Administradores podem deletar um registro de usuário!";
            header('Location: /usuario');
        } else {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $usuario = $this->model->find($id);
            $this->view->setLayout('manager');
            $this->view->addAttribute('usuario', $usuario);
            return $this->view->render('admin/usuario/excluir');
        }
    }

    /**
     * Somente adm podem deletar usuários 
     */
    public function deletePost()
    {

        if ($_SESSION['username']->admin != 1) {
            $_SESSION['erros'][] = "Somente usuários Administradores podem deletar um registro de usuário!";
            header('Location: /usuario');
        } else {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

            try {
                $this->model->delete($id);
                $_SESSION['status'] = 'Registro deletado com sucesso!';
                header('Location: /usuario');
            } catch (Exception $ex) {
                $_SESSION['erros'][] = "Erro ao deletar registro. {$ex->getMessage()}";
            }
        }
    }

    /**
     * Retorna a view com o formulário para inserir novo usuário
     * Caso o usuário náo seja um administrador o mesmo será redirecionado 
     * para a página de listagem de usuário com a mensagem que somente adm pode inserir
     * novos usuários
     */
    public function inserir()
    {
        if ($_SESSION['username']->admin != 1) {
            $_SESSION['erros'][] = "Somente usuários Administradores podem inserir um registro de usuário!";
            header('Location: /usuario');
        } else {
            $this->view->setLayout('manager');
            return $this->view->render('admin/usuario/inserir');
        }
    }

    /**
     * Insere um registro de usuário no banco de dados
     * Somente administradores podem inserir registros de usuários
     */
    public function inserirPost()
    {
        if ($_SESSION['username']->admin != 1) {
            $_SESSION['erros'][] = "Somente usuários Administradores podem inserir um registro de usuário!";
            header('Location: /usuario');
        } else {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha');
            $senhaConfirmarcao = filter_input(INPUT_POST, 'confirme_senha');
            $admin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_INT);

            if (!$nome) {
                $_SESSION['erros'][] = "O Campo nome é obrigatório";
                header('Location: /inserirUsuario');
                exit();
            }
            if (!$username) {
                $_SESSION['erros'][] = "O Campo username é obrigatório";
                header('Location: /inserirUsuario');
                exit();
            }
            if (!$senha) {
                $_SESSION['erros'][] = "O Campo senha é obrigatório";
                header('Location: /inserirUsuario');
                exit();
            }
            if ($admin === false) {
                $_SESSION['erros'][] = "O Campo admin é obrigatório";
                header('Location: /inserirUsuario');
                exit();
            }

            try {
                if ($senha !== $senhaConfirmarcao) {
                    $_SESSION['erros'][] = "Senha e confirmação de senhas devem ser iguais!";
                    header('Location: /inserirUsuario');
                    exit();
                }

                $data = [
                    'nome' => $nome,
                    'username' => $username,
                    'senha' => password_hash($senha, PASSWORD_DEFAULT),
                    'admin' => (int) $admin,
                    'must_change_password' => 1
                ];



                $this->model->insert(['nome', 'username', 'senha', 'admin', 'must_change_password'], $data);

                $_SESSION['status'] = 'Registro inserido com sucesso!Usuário deverá alterar a senha no próximo login';
                header('Location: /usuario');
            } catch (\PDOException $exc) {
                $_SESSION['erros'][] = "Erro: {$exc->getMessage()}";
                header('Location: /inserirUsuario');
            }
        }
    }

    public function senha()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        if (( $id !== (int) $_SESSION['username']->id ) && (int) $_SESSION['username']->admin !== 1) {
            $_SESSION['erros'][] = "Você não tem permissão para editar esse registro!";
            header('Location: /usuario');
        } else {

            $this->view->setLayout('manager');
            $usuario = $this->model->find($id);



            $this->view->addAttribute('usuario', $usuario);
            return $this->view->render('admin/usuario/senha');
        }
        
    }
    
    /**
     * Grava no banco as alterações de senhas
     * Caso o usuário seja o adminstrador e esteja alterando a senha de outro usuário
     * o registro será marcado para que no próximo login o usuário tenha que alterar a
     * senha por uma senha própria
     */
    public function senhaPost()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);


        if (( $id !== (int) $_SESSION['username']->id ) && (int) $_SESSION['username']->admin !== 1) {
            $_SESSION['erros'][] = "Você não tem permissão para editar esse registro!";
            header('Location: /usuario');
        } else {
            $senha = filter_input(INPUT_POST, 'nova_senha', FILTER_SANITIZE_STRING );
            $confirmacaoSenha = filter_input(INPUT_POST, 'confirme_senha', FILTER_SANITIZE_STRING );
            
            if( $senha !== $confirmacaoSenha ){
                $_SESSION['erros'][] = 'Senhas não conferem!';
                header('Location: /senhaUsuario?id=' . $id );
                exit();
            }else{
                $deveMudarSenha = 0;
                $mensagemStatus = "Senha Alterada com sucesso";
                //se o usuário logado é Administrador e está alterando a senha de outro usuário
                //faz com que o usuário tenha que alterar a senha no próximo login
                if( $_SESSION['username']->admin && (int) $_SESSION['username']->id !== $id ){
                    $deveMudarSenha = 1;
                    $mensagemStatus = "Senha Alterada com sucesso! O Usuário deverá mudar a senha no próximo Login";
                }
                
                $this->model->update($id, ['senha' => password_hash($senha, PASSWORD_DEFAULT ), 
                    'must_change_password' => $deveMudarSenha] );
                $_SESSION['status'] = $mensagemStatus;
                header('Location: /usuario');
                
            }
        }
    }

    public function show()
    {
        
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $usuario = $this->model->find($id);
        
        if( $usuario == null ){
            $_SESSION['erros'][] = "Usuário não encontrado";
            header('Location: /usuario');
            exit();
        }
        
        

        $this->view->addAttribute('usuario', $usuario);
        $this->view->setLayout('manager');

        return $this->view->render('admin/usuario/show');
    }

}
