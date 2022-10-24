<?php

namespace Fcker\Framework\Core;

class View
{
    public function __construct() {}

    static function render($tpl_file, $data = null)
    {
        $file_path = __ROOT__ . 'application/Views/' . $tpl_file . '.php';

        if (!file_exists( $file_path )) 
            throw new \Exception('View not found!');

        if (isset($data))
            extract( $data );

        header( 'Content-Type: text/html ');
        ob_start();
        include $file_path;
        return ob_get_clean();
    }
}
