<?php

header("Content-type: text/css; charset: UTF-8");
$css = "";
// Load reset, defaults and fonts
$css = $css . file_get_contents("reset.css") . PHP_EOL;
$css = $css . file_get_contents("fonts.css") . PHP_EOL;
$css = $css . file_get_contents("main.css") . PHP_EOL;
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
        $css = $css . file_get_contents($css_file) . PHP_EOL;
    }
}
echo $css;
