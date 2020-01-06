<?php
include "header.php";
$projects = getProjects();
?>

<body>
    <div class="lang_selector"><img onclick="document.cookie = 'lang=Dutch'; location.reload();" src="/public/images/icons/nl.svg" alt="dutch"><img onclick="document.cookie = 'lang=English'; location.reload();" src="/public/images/icons/gb.png" alt="english"></div>
    <header>
        <div class="overlay">
            <div class="header">
                <a href="/"><img src="/public/images/icons/logo.svg" alt="Website logo" class="header__logo"></a>
                <h2 class="header__title">Joshua van der Poll</h2>
                <a href="/#contact-methods"><button class="header__button"><?php echo $contents['contact_button']; ?></button></a>
            </div>
            <h1 class="title"><?php echo $contents['projects_title'] ?></h1>
            <img class="scrolldown" alt="Scrolldown" src="/public/images/gifs/scroll_down.gif">
        </div>
        <main>
            <section class="functions">
                <input class="functions__search" autocomplete="off" type="search" name="search" placeholder="<?php echo $contents['projects_placeholder'] ?>">
                <button class="functions__button functions--active">All</button>
                <button class="functions__button">Backend</button>
                <button class="functions__button">Frontend</button>
                <button class="functions__button">Apps</button>
                <button class="functions__button">Work in progress</button>
            </section>
            <section class="projects">
                <div class="projects__list">
                    <?php foreach ($projects as $project) { ?>
                        <a href="/project/<?php echo strtolower($project['title']) ?>">
                            <div class="projects__project">
                                <div class="projects__top">
                                    <img class="projects__image" src="<?php echo (file_exists($_SERVER['DOCUMENT_ROOT'] . "/public/images/projects/" . $project['image']) == "" ? "https://via.placeholder.com/300x200" : "/public/images/projects/" . $project['image']); ?>" alt="<?php echo $project['name'] ?>">
                                </div>
                                <div class="projects__bottom">
                                    <p class="projects__title"><?php echo $project['title'] ?></p>
                                    <p class="projects__description"><?php echo text_trim($project[$lang]['description'], 246) ?></p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </section>
        </main>
</body>
<?php
include "footer.php";
?>