<?php
$config = getConfig();
if($config['inline_css']) {
    echo '<style>'.file_get_contents('https://joshuavanderpoll.nl/public/css/main.php?css='.$css).'</style>';
}
?>
</html>