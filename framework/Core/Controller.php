<?php

namespace Fcker\Framework\Core;

abstract class Controller
{
    public function __construct() {}

    abstract protected function index();
}
