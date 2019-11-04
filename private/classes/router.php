<?php
$whitelist = array( //Check if localhost
    '127.0.0.1',
    'localhost',
    '::1'
);
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){ //Force https
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

include "./private/functions.php";
class Home {
	public function __construct() {
		include "./private/views/header.php";
		include "./private/pages/home.php";
		include "./private/views/footer.php";
	}
}
class Project {
	public function __construct() {
		include "./private/views/header.php";
		include "./private/pages/project.php";
		include "./private/views/footer.php";
	}
}
class Contact {
	public function __construct() {
		include "./private/views/header.php";
		include "./private/pages/contact.php";
		include "./private/views/footer.php";
	}
}
class NotFound {
	public function __construct() {
		include "./private/views/header.php";
		include "./private/pages/404.php";
		include "./private/views/footer.php";
	}
}