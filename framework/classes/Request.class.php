<?php

class Request {
  static protected $_instance = null;

  static protected $_controller = null;
  static protected $_method = null;
  static protected $_params = [];

  static public function getInstance(): mixed {
    if ( ! self::$_instance instanceof self ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function __construct() {
    $uri = urldecode(
        parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH )
    );
    $parts = explode( '/', $uri );
    $parts = array_filter( $parts );

    $this->setRequests( $parts );
  }

  private function setRequests( array $parts ): void {
    self::$_controller = array_shift( $parts ) ?: 'index';
    self::$_method     = array_shift( $parts ) ?: 'index';
    self::$_params     = ( isset( $parts[0] ) ) ? $parts : [];
  }

  public function getController(): string {
    return self::$_controller;
  }

  public function getMethod(): string {
    return self::$_method;
  }

  public function getParams(): array {
    return self::$_params;
  }
}
