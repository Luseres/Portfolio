<?php
include "404_header.php";

$randProjects = getRandomProjects(2);

?>

<body>
    <div class="lang_selector"><img onclick="document.cookie = 'lang=Dutch'; location.reload();" src="/public/images/icons/nl.svg" alt="dutch"><img onclick="document.cookie = 'lang=English'; location.reload();" src="/public/images/icons/gb.png" alt="english"></div>
    <header>
        <div class="overlay">
            <div class="header">
                <a href="/"> <img src="/public/images/icons/logo.svg" alt="Website logo" class="header__logo"></a>
                <h2 class="header__title">Joshua van der Poll</h2>
                <a href="#contact-methods"><button class="header__button"><?php echo $contents['contact_button']; ?></button></a>
            </div>
            <h1 class="error-404"><?php echo $contents['404_title']; ?></h1>
            <a class="error-404-link" href="/">
                <p><?php echo $contents['404_link']; ?></p>
            </a>
        </div>
</body>
<?php
include "footer.php";
?>