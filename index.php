<?php

include "route.php";
include "private/classes/router.php";

$route = new Route();

$route->add('/', 'Home');
$route->add('/signup', 'Signup');
$route->add('/signin', 'Signin');
$route->add('/dashboard', 'Loggedin');
$route->add('/logout', 'Logout');

$route->submit();