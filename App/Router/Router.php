<?php
namespace App\Router;


/**
 * Description of Router
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Router
{
    private $rotas;
    protected $controller;
    protected $action;


    public function __construct()
    {
        $this->rotas = include( __DIR__.'/rotas.php');       
    }
    
    public function dispatch( $uri )
    {
        array_walk($this->rotas, function($rota) use($uri ) {
            if( $uri == $rota['route']){
                $this->controller = APP_CONTROLLERS_NAMESPACE . $rota['controller'];
                $this->action = $rota['action'];
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
