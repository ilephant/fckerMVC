<?php

spl_autoload_register( function ( $class ): bool {
  require_once __ROOT__ . 'framework/classes/' .  $class . '.class.php';
});
