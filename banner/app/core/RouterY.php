<?php
namespace Easy\Routing;
use Easy\Controllers;

class Router {
    protected $controller = 'Home';
    protected $action = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        if (file_exists('./app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
        require_once './app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
