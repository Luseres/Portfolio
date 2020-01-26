<?php

require $_SERVER["DOCUMENT_ROOT"] . "/private/includes/main_functions.php";

header("Content-type: text/css; charset: UTF-8");
$css = "";
// Load reset, defaults and fonts
$css = $css . file_get_contents("reset.css");
$css = $css . file_get_contents("fonts.css");
$css = $css . file_get_contents("main.css");
// Load the page css file
if (isset($_GET['css'])) {
    $css_file = "";

    if (strpos($_GET['css'], '/') !== false) {
        $css_arr = explode("/", $_GET['css']);
        $css_file = $css_arr[1] . ".css";
    }
    if ($_GET['css'] == "home") {
        $css_file = "home.css";
    }
    if (file_exists($css_file)) {
        $css = $css . file_get_contents($css_file);
    }
}

$css = minifyCSS($css);

echo $css;
