<?php
namespace App\Router;


/**
 * Description of Router
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Router
{
    private   $rotas;
    protected $controller;
    protected $action;
    protected $login;
    protected $connection;


    public function __construct()
    {
        $this->rotas = include( __DIR__.'/rotas.php');       
        $this->connection = new \App\Database\Conexao();
        $this->login = new \App\Util\Login( $this->connection->getConnection() );
    }
    
    public function dispatch( $uri )
    {
        array_walk($this->rotas, function($rota) use($uri ) {
            if( $uri == $rota['route']){
                
                //verifica se a rota precisa de login
                if( isset($rota['protected']) && $rota['protected'] === true ){
                    //verifica se o usuário não está logado, se não estiver 
                    //redireciona para a página de login                                       
                    if( !$this->login->isLoged() ){
                        $this->controller = '\App\Controller\LoginController';
                        $this->action = 'doLogin';
                        
                    }else{
                        $this->controller = APP_CONTROLLERS_NAMESPACE . $rota['controller'];
                        $this->action = $rota['action'];
                    }
                }else{
                    $this->controller = APP_CONTROLLERS_NAMESPACE . $rota['controller'];
                    $this->action = $rota['action'];
                }
                
            }

        });
        
        if( null === $this->controller ){
            header("HTTP/1.0 404 Not Found");
            throw new \Exception("Página não encontrada");
        }
        $instance = new $this->controller;
        
        
        call_user_func( array( $instance, $this->action ) );
    }

}
