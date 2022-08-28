<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

define( '__ROOT__', dirname( __FILE__ ) . '/' );

// Подключаем фреймворк
require_once( __ROOT__ . 'framework/bootstrap.php' );

try {
  $router = Router::getInstance();
  $router->getRoute( new Request() );
} catch ( Exception $e ) {
  echo $e->getMessage();
}
