<?php

namespace App\Router;

/**
 * Description of Router
 *
 * @author Evandro Lacerda <evandroplacerda@@gmail.com>
 */
class Router {

    private $rotas;
    protected $controller;
    protected $action;
    protected $login;
    protected $connection;
    protected $isProtected;

    public function __construct() {
        $this->rotas = include( __DIR__ . '/rotas.php');
        $this->connection = new \App\Database\Conexao();
        $this->login = new \App\Util\Login($this->connection->getConnection());
    }

    public function dispatch($uri) {
        
        foreach( $this->rotas as $route )
        {
            if( $uri == $route['route'])
            {
                $this->getControllerAndAction($route);
            }
        }

        if (null === $this->controller) {
            header("HTTP/1.0 404 Not Found");
            throw new \Exception("Página não encontrada");
        }
        
        $this->checkLevelAccess();
        
        $instance = new $this->controller;


        call_user_func(array($instance, $this->action));
    }

    private function isRouteProtected($route) {
        return isset($route['protected']) && $route['protected'] === true;
    }

    private function getControllerAndAction($route) {
        
        $this->controller = APP_CONTROLLERS_NAMESPACE . $route['controller'];
        $this->action = $route['action'];
        
        if( $this->isRouteProtected($route))
        {
            $this->isProtected = true;
        }
    }

    private function checkLevelAccess() {
        
        if( $this->isProtected === true && !$this->login->isLoged() ){
            $this->controller = '\App\Controller\LoginController';
            $this->action = 'doLogin';
        }
    }

}
