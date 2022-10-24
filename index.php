<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

define( '__ROOT__', dirname( __FILE__ ) . '/' );

// Подключаем фреймворк
require_once( __ROOT__ . 'framework/Psr4AutoloaderClass.php' );

// instantiate the loader
$loader = new Premade\Framework\Psr4AutoloaderClass;

// register the autoloader
$loader->register();

// register the base directories for the namespace prefix
$loader->addNamespace('Premade\Framework', __ROOT__ . 'framework/');
$loader->addNamespace('Premade\Application', __ROOT__ . 'application/');

use Premade\Framework\Core\Router;
use Premade\Framework\Core\Request;

try {
    $router = Router::getInstance();
    $router->getRoute( new Request() );
} catch ( \Exception $ex ) {
    echo $ex->getMessage();
}
