<?php

class View {
  public function __construct() {}

  static function render( string $tpl_file, array $data = null ): void {
    $file_path = __ROOT__ . 'application/views/' . $tpl_file . '.html';

    if ( ! file_exists( $file_path ) )
      throw new Exception( 'Template not found!' );

    if ( isset( $data ) ) {
      extract( $data );
    }

    require_once $file_path;
  }
}
