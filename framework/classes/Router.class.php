<?php

class Router {
  static protected $_instance = null;

  static protected $_request = null;

  public function __construct() {
    self::$_request = Request::getInstance();
  }

  static public function getInstance() {
    if ( ! self::$_instance instanceof self ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function getRoute(): void {
    $controller = ucfirst( self::$_request->getController() ) . 'Controller';
    $method     = self::$_request->getMethod();
    $params     = self::$_request->getParams();

    $controller_file = __ROOT__ . 'application/controllers/' . $controller . '.php';

    if ( ! is_readable( $controller_file ) ) {
      header( 'HTTP/1.1 404 Not Found' );
      throw new Exception( '404 - ' . self::$_request->getController().' not found');
    }

    require_once $controller_file;

    $controller = new $controller;
    $method = ( is_callable( [ $controller, $method ] ) ) ? $method : 'index';

    if ( ! empty( $params ) ) {
      call_user_func_array( [ $controller, $method ], $params );
    } else {
      call_user_func( [ $controller, $method ] );
    }

    return;
  }
}
