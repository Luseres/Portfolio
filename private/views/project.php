<?php

include "header.php";

$project_name = explode("/", $_REQUEST['uri'])[array_key_last(explode("/", $_REQUEST['uri']))];
if (!projectExists($project_name)) {
    redirect("/not_found");
    exit();
}

$project = getProjectByName($project_name);

?>

<body>
    <div class="lang_selector"><img onclick="document.cookie = 'lang=Dutch'; location.reload();" src="/public/images/icons/nl.svg" alt="dutch"><img onclick="document.cookie = 'lang=English'; location.reload();" src="/public/images/icons/gb.png" alt="english"></div>
    <header>
        <div class="overlay">
            <div class="header">
                <a href="/"><img src="/public/images/icons/logo.svg" alt="" class="header__logo"></a>
                <h2 class="header__title">Joshua van der Poll</h2>
                <a href="/#contact-methods"><button class="header__button"><?php echo $contents['contact_button']; ?></button></a>
            </div>
            <h1 class="title"><?php echo $project['title'] ?></h1>
            <h2 class="subtitle"><?php echo $project['client'] ?></h2>
            <img class="scrolldown" src="/public/images/gifs/scroll_down.gif">
        </div>
        <main>
            <div class="project">
                <div class="project--left">
                    <?php if ($project['git_link'] !== "" || $project['live_link'] !== "" || sizeof($project['team']) > 0) { ?>
                        <div class="project__sidebar">
                            <div class="project__general">
                                <?php if ($project['git_link'] !== "" || $project['live_link'] !== "") { ?>
                                    <h2 class="project__external">External links:</h2>
                                    <div class="project__links">
                                        <?php if ($project['git_link'] !== "") { ?>
                                            <a href="<?php echo $project['git_link'] ?>" target="_blank">
                                                <div class="project__icon">
                                                    <div class="project__icon-image"><img src="/public/images/icons/github.png" alt="Github icon"></div>
                                                    <p class="project__icon-name">Github</p>
                                                </div>
                                            </a>
                                        <?php } ?>
                                        <?php if ($project['live_link'] !== "") { ?>
                                            <a href="<?php echo $project['live_link'] ?>" target="_blank">
                                                <div class="project__icon">
                                                    <div class="project__icon-image"><img src="/public/images/icons/earth.png" alt="Website icon"></div>
                                                    <p class="project__icon-name">Online</p>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if (sizeof($project['team']) > 0) { ?>
                                    <h2 class="project__team">Project team:</h2>
                                    <?php foreach ($project['team'] as $member) { ?>
                                        <a href="<?php echo $member['portfolio'] ?>" target="_blank">
                                            <div class="project__member">
                                                <div class="project__member-image">
                                                    <img src="<?php echo $member['image'] ?>" alt="<?php echo $member['name'] ?>" class="project__member-imagesource">
                                                </div>
                                                <div class="project__member-info">
                                                    <p class="project__member-name"><?php echo $member['name'] ?></p>
                                                    <p class="project__member-title"><?php echo $member['task'] ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (sizeof($project['code_langs']) > 0) { ?>
                        <div class="project__sidebar">
                            <div class="project__languages">
                                <h2 class="project__usedlangs"><?php echo $contents['project_usedcode']; ?></h2>
                                <?php foreach ($project['code_langs'] as $code_lang) { ?>
                                    <p class="project__language"><?php echo $code_lang ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="project--right">
                    <div class="project__info">
                        <?php if ($project[$lang]['description'] !== "") { ?>
                            <h2 class="project__about-title"><?php echo $contents['project_about']; ?></h2>
                            <p class="project__about-main"><?php echo $project[$lang]['description']; ?></p>
                        <?php } ?>
                        <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/public/images/projects/" . $project['image'])) { ?>
                            <img class="project__about-preview" src="/public/images/projects/<?php echo $project['image'] ?>" alt="Project preview">
                        <?php } ?>
                        <?php if ($project[$lang]['task'] !== "") { ?>
                            <h2 class="project__about-subtitle"><?php echo $contents['project_task']; ?></h2>
                            <p class="project__about-task"><?php echo $project[$lang]['task']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
</body>
<?php
include "footer.php";
?>