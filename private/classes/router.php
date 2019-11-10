<?php

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
		http_response_code(404);
		include "./private/views/header.php";
		include "./private/pages/404.php";
		include "./private/views/footer.php";
		die();
	}
}