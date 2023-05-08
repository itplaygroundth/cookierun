<?php

namespace Easy;

use Easy\Routing\Router;

class App {
    protected $database;
    
    public function __construct(){
        Router::parse_url();
        Router::parse_controller();
        $controller = Router::get_controller(Router::$controller,Router::$path);
        $method = Router::parse_method($controller);
        $params = Router::get_params();
        call_user_func_array([ $controller, $method ], []);
    }
}