<?php
use App\Router\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');


session_start();

/**
 * -----------------------------------------------------------------------------
 * CONSTANTES DA APLICAÇÃO
 */
define('VIEWS_PATH', __DIR__ .'/Views/');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_CONTROLLERS_NAMESPACE', "\App\\Controller\\" );


//autoload com namespaces
spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);

    
    $fileName = BASE_PATH . '/'. $class . '.php';
       
    
    if (file_exists($fileName)) {
        require_once $fileName;
    }
});

//pega a rota da url
$uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
//$uri = ltrim( $rota['path'], '/');

$router = new \App\Router\Router();

try {
    $router->dispatch($uri);
} catch (\Exception $exc) {
    echo "<div>";
    echo $exc->getMessage();
    echo "</div>";
}


