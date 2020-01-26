<?php

require 'private/includes/main_functions.php';
$lang = getClientLang();
$contents = getContents($lang);

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$ip = $_SERVER['REMOTE_ADDR'];
$user = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "Unknown");
$source = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Unknown");

header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");

header("Cache-Control: max-age=3600");




require 'private/includes/AltoRouter.php';

$whitelist = array(
    '127.0.0.1',
    'localhost',
    '::1'
);
if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
        if (!headers_sent()) {
            header("Status: 301 Moved Permanently");
            header(sprintf(
                'Location: https://%s%s',
                $_SERVER['HTTP_HOST'],
                $_SERVER['REQUEST_URI']
            ));
            exit();
        }
    }
}
//301 Backup redirect
if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
    header("HTTP/1.1 301 Moved Permanently");
    header("Status: 301 Moved Permanently");
    header("Location: https://joshuavanderpoll.nl");
}

$router = new AltoRouter();

$router->map('GET', '/', 'private/views/home.php', 'home');
$router->map('GET', '/projects', 'private/views/projects.php', 'projects');
$router->map('GET', '/project/[*:project]', 'private/views/project.php', 'project');

$match = $router->match();
if ($match) {
    require $match['target'];
} else {
    header("HTTP/1.0 404 Not Found");
    require 'private/views/404.php';
}
