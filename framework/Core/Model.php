<?php

namespace Fcker\Framework\Core;

abstract class Model
{
    public $db = null;

    public function __construct()
    {
        $this->openDatabaseConnection();
    }

    private function openDatabaseConnection()
    {
        $options = [ \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING ];
        $this->db = new \PDO( 'mysql:host=localhost;dbname=cms_done;charset=utf8', 'user', 'siteupper_db', $options );
    }
}
