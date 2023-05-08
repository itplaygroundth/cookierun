<?php

namespace Easy\Controllers;

use Easy\Routing\Router;
use Easy\Traits\Paramsable;

class Controller {
    use Paramsable;

    public $views = [];

    public function __construct(array $params = [])
    {
        $this->add_params($params);
    }

    public function add_view_content($name, $data)
    {
        $this->views[$name] = $data;
    }

    public function run()
    {
        if (!Router::$controller_settings['has_view']) {
            return;
        }

        if (Router::$path == '') {

        }
    }

    protected function model($model) {
        require_once './app/models/'.ucfirst($model).'.php';
        return new $model();
    }
    protected function view($view,$data=[]) {
        require_once './app/views/'.$view.'.php';
    }
}