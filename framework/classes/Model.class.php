<?php

abstract class Model {
  protected function __construct() {}

  static function load( string $name ): void {
    $model_path = __ROOT__ . 'application/models/' . $name . '.class.php';

    if ( ! is_readable( $model_path ) )
      throw new Exception( 'Model ' . $name . ' not found!' );

    require_once( $model_path );
  }
}
