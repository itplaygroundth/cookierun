<?php
 
define('EASYCAT', 1);
define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');
define('APP_PATH', ROOT_PATH . 'app/');

require_once APP_PATH . 'config/config.php';
define('COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', SITE_URL));
$samesite_strict = isset($_GET['easy']) && strpos($_GET['easy'], 'pixel') === 0;
session_set_cookie_params([
    'lifetime' => null,
    'path' => COOKIE_PATH,
    'samesite' => $samesite_strict ? 'Strict' : 'Lax'
]);

$should_start_session = !isset($_GET['easy'])
    || (
        isset($_GET['easy'])
        // && !(strpos($_GET['easy'], 'pixel') === 0)
        // && !(strpos($_GET['easy'], 'pixel-track') === 0)
        // && !(strpos($_GET['easy'], 'cron') === 0)
        // && !(strpos($_GET['easy'], 'sitemap') === 0)
    );


if ($should_start_session) {
    session_start();
}
require_once APP_PATH . 'core/App.php';
require_once APP_PATH . 'core/Database.php';
require_once APP_PATH . 'core/Router.php';
require_once APP_PATH . 'traits/Apiable.php';
require_once APP_PATH . 'traits/Paramsable.php';
require_once APP_PATH . 'core/Controller.php';

