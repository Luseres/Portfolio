<?php

include "route.php";
include "private/classes/router.php";

$route = new Route();

$route->add('/', 'Home');
$route->add('/project', 'Project');
$route->add('/contact', 'Contact');

$route->submit();
