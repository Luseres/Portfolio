<?php
include("../../private/functions.php");
$config = getConfig();
//Create CSS headers and variables
header("Content-type: text/css; charset: UTF-8");
$css = "";
//Load reset, defaults and fonts
$css = $css . file_get_contents("reset.css");
$css = $css . file_get_contents("main.css");
$css = $css . file_get_contents("fonts.css");
//Load the page css file
if(isset($_GET['css'])) {
    if(file_exists(str_replace("/", "", $_GET['css']) . ".css")) {
        $css = $css . file_get_contents(str_replace("/", "", $_GET['css']) . ".css");
    }
}
//Load en minify final css
if($config['minify_css']) {
    echo minifyCSS($css);
} else {
    echo $css;
}



?>