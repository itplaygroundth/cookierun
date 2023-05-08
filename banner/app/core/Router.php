<?php

namespace Easy\Routing;

class Router
{
    public static $params = [];
    public static $original_request = '';
    public static $path = '';
    public static $controller_key = 'index';
    public static $controller = 'Index';
    public static $controller_settings = [
        'menu_absolute'         => false,
        'menu_no_margin'        => false,
        'body_white'            => true,
        'wrapper'               => 'wrapper',
        'no_authentication_check' => false,
        'has_view'              => true,
        'no_ads'                => false
    ];
    public static $method = 'index';
    public static $data = [];

    public static $routes = [
        '' => [
            'index' => [
                'controller' => 'Index',
                'settings' => [
                    'wrapper' => 'home_wrapper',
                    'menu_absolute' => true,
                    'menu_no_margin' => true
                ]
            ],
        ]
    ];



    public static function parse_url()
    {
        $params = self::$params;

        if (isset($_GET['easy'])) {
            $params = explode('/', filter_var(rtrim($_GET['easy'], '/'), FILTER_SANITIZE_URL));
        }

        self::$params = $params;

        return $params;
    }

    public static function get_params()
    {
        return self::$params = array_values(self::$params);
    }

    public static function parse_controller()
    {
        self::$original_request = implode('/', self::$params);
        if (!empty(self::$params[0])) {
            if (in_array(self::$params[0], ['admin', 'admin-api'])) {
                self::$path = self::$params[0];
                unset(self::$params[0]);
                self::$params = array_values(self::$params);
            }
        }

        if (!empty(self::$params[0])) {
            if (array_key_exists(self::$params[0], self::$routes[self::$path]) && file_exists(APP_PATH . 'controllers/' . (self::$path != '' ? self::$path . '/' : null) . self::$routes[self::$path][self::$params[0]]['controller'] . '.php')) {
                self::$controller_key = self::$params[0];
                unset(self::$params[0]);
            } else {
                self::$path = '';
                self::$controller_key = 'notfound';
            }
        }
        self::$controller = self::$routes[self::$path][self::$controller_key]['controller'];
        if (self::$path == 'admin' && !isset(self::$routes[self::$path][self::$controller_key]['settings'])) {
            self::$routes[self::$path][self::$controller_key]['settings'] = ['authentication' => 'admin'];
        }
        if (isset(self::$routes[self::$path][self::$controller_key]['settings'])) {
            self::$controller_settings = array_merge(self::$controller_settings, self::$routes[self::$path][self::$controller_key]['settings']);
        }

        return self::$controller;
    }

    public static function get_controller($controller_name, $path = '')
    {
        require_once APP_PATH . 'controllers/' . ($path != '' ? $path . '/' : null) . $controller_name . '.php';
        $class = 'Easy\\Controllers\\' . $controller_name;
        $controller = new $class;

        return $controller;
    }

    public static function parse_method($controller)
    {
        $method = self::$method;
       if (isset(self::get_params()[0]) && method_exists($controller, self::get_params()[0])) {
            $reflection = new \ReflectionMethod($controller, self::get_params()[0]);
            if ($reflection->isPublic()) {
                $method = self::get_params()[0];
                unset(self::$params[0]);
            }
        }
        return $method;
    }
}