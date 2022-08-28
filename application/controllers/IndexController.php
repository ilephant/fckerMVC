<?php

class IndexController extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    Model::load( 'UserModel' );
    $vars['user'] = UserModel::getUser();

    return View::render( 'index', $vars );
  }

  public function test() {
    return var_dump( 'Test method.' );
  }
}
