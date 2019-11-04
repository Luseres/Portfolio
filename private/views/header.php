<?php
$css = "public/css/home.css"; //Custom css selector
if($_SERVER['REQUEST_URI'] !== '/') {
	$css = 'public/css/' . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . ".css";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo getTitle(); ?></title>
	<meta charset="utf-8"/>
	<meta name="description" content="<?php echo getDescription(); ?>">
	<meta name="keywords" content="<?php echo getKeywords(); ?>">
	<meta name="author" content="<?php echo getAuthor(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel='manifest' href='manifest.json'>
    <link rel='canonical' href='https://joshuavanderpoll.nl/'>
	<link rel="stylesheet" href="public/css/reset.css">
	<link rel="stylesheet" href="public/css/main.css">
	<link rel="stylesheet" href="<?php echo $css; ?>">
	<link rel="stylesheet" href="public/css/fonts.css">
	<meta name="theme-color" content="#292A2E"/>
	<link rel="shortcut icon" type="image/x-icon" href="./public/img/logo.ico"/>
	<link rel="apple-touch-icon" href="./public/img/logo.svg">
    <meta name='msapplication-TileImage' content='./public/img/logo.svg'>
    <meta name='msapplication-TileColor' content='#292A2E'>
	<meta name="msapplication-square310x310logo" content="./public/img/logo.svg">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>