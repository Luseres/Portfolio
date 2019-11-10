<?php

//Include functions and config
include "private/functions.php";
$config = getConfig();

//PHP Error handling
if($config['display_php_errors']) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

//Force HTTPS
$whitelist = array(
    '127.0.0.1',
    'localhost',
    '::1'
);
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
	    if(!headers_sent()) {
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
    header("Status: 301 Moved Permanently");
    header("Location: https://joshuavanderpoll.nl");
}

//Log users connection
$ip = $_SERVER['REMOTE_ADDR'];
$user = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "Unknown");
$source = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Unknown");
logUser($ip, $user, $source);

//Security headers
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");

//Automatic language detector
$_POST['lang'] = "English";
$ip = $_SERVER['REMOTE_ADDR'];
$json = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
$decoded = json_decode($json, true);
if($decoded['country'] == "Netherlands") {
    $_POST['lang'] = "Dutch";
}

//MVC Structure
include "route.php";
include "private/classes/router.php";
$route = new Route();
$route->add('/', 'Home');
$route->add('/project', 'Project');
$route->add('/contact', 'Contact');
$route->submit();