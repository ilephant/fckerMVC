<?php

namespace Fcker\Application\Controllers;

use Fcker\Framework\Core\Controller;
use Fcker\Framework\Core\Response;

use Fcker\Application\Models\UserModel;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $users = new UserModel();
        $vars['users'] = $users->all();

        return View::render( 'index', $vars );
    }

    public function test() {
        return var_dump( 'Test method.' );
    }
}
