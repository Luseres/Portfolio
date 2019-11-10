<?php 

$config = getConfig();

//Minify content
if($config['minify_page']) {
    function sanitize_output($buffer){$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');$replace = array('>','<','\\1');$buffer = preg_replace($search, $replace, $buffer);return $buffer;}ob_start("sanitize_output");
}

$css = "home"; 
if($_SERVER['REQUEST_URI'] !== '/') { 
    $css = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
}
?>
<!DOCTYPE html>
    <!-- This website is made by Joshua van der Poll -->
    <html <?php if($_POST['lang'] == "English") {
        echo "lang='en'";
    } else {
        echo "lang='nl'";
    } ?>>
    <head>
        <!-- Defaults -->
        <title><?php echo getTitle($_POST['lang'], $css); ?></title>
        <meta charset="utf-8" />
        <meta name="description" content="<?php echo getDescription($_POST['lang'], $css); ?>">
        <meta name="keywords" content="<?php echo getKeywords(); ?>">
        <meta name="author" content="<?php echo getAuthor(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="theme-color" content="#292A2E" />
        <meta name="robots" content="index, follow">
        <link rel='manifest' href='manifest.json'>
        <!-- Open graph protocol -->
        <meta property="og:title" content="<?php echo getTitle($_POST['lang'], $css); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="https://joshuavanderpoll.nl/public/img/joshuavdpoll.jpg" />
        <meta property="og:url" content="https://www.joshuavanderpoll.nl" />
        <meta property="og:description" content="<?php echo getDescription($_POST['lang'], $css); ?>" />
        <meta property="og:site_name" content="<?php echo getTitle($_POST['lang'], $css); ?>" />
        <!-- Social media data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:image" content="https://joshuavanderpoll.nl/public/img/joshuavdpoll.jpg">
        <meta name="twitter:title" content="<?php echo getTitle($_POST['lang'], $css); ?>">
        <meta name="twitter:description" content="<?php echo getDescription($_POST['lang'], $css); ?>">
        <meta name="twitter:site" content="https://www.joshuavanderpoll.nl/">
        <!-- Load external libraries -->
        <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151534947-1"></script>
        <!-- Generate CSS -->
        <?php
        if(!$config['inline_css']) {
            echo '<link rel="stylesheet" href="public/css/main.php?css='.$css.'">';
        }
        ?>
        <!-- Load theme colors -->
        <meta name='msapplication-TileColor' content='#292A2E'>
        <!-- Load icons -->
        <link rel="icon" href="./public/img/logo_dark.svg" media="(prefers-color-scheme:no-preference)">
        <link rel="icon" href="./public/img/logo_dark.svg" media="(prefers-color-scheme:light)">
        <link rel="icon" href="./public/img/logo.svg" media="(prefers-color-scheme:dark)">
        <link rel="apple-touch-icon" sizes="57x57" href="./public/img/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="./public/img/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="./public/img/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="./public/img/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./public/img/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./public/img/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./public/img/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="./public/img/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./public/img/icons/apple-icon-180x180.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="./public/img/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="./public/img/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./public/img/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="./public/img/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./public/img/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="./public/img/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./public/img/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="./public/img/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon-precomposed" sizes="180x180" href="./public/img/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="./public/img/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./public/img/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="./public/img/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./public/img/icons/favicon-16x16.png">
        <meta name="msapplication-TileImage" content="./public/img/icons/ms-icon-144x144.png">
        <meta name="msapplication-square310x310logo" content="./public/img/icons/logo.svg">
        <link rel="mask-icon" href="./public/img/logo.svg" color="#292A2E">


        <script type="application/ld+json">
            {"@context":"http://schema.org",
            "@type":"Person",
            "name":"Joshua van der Poll",
            "email":"joshua@jvdpoll.nl",
            "description":"Joshua van der Poll is a full-stack web developer based in the Netherlands.",
            "image":"https://joshuavanderpoll.nl/public/img/joshuavdpoll.jpg",
            "gender":"http://schema.org/Male",
            "url":"https://www.joshuavanderpoll.nl",
            "knows":"HTML5, CSS3, JS, PHP, jQuery, Sass",
            "sameAs":
            ["https://instagram.com/joshua_vdpoll/",
            "https://www.facebook.com/joshua.vanderpoll.5",
            "https://www.facebook.com/Joshua-van-der-Poll-109904557120548/",
            "https://www.linkedin.com/in/joshuavdpoll/",
            "https://www.instagram.com/joshua_vdpoll/",
            "https://www.youtube.com/channel/UCP05TkaljaRlHfhSzIUtGIw"
            ]}
        </script>
    </head>
    