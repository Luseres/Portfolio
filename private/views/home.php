<?php
include "header.php";

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
            <h1 class="title"><?php echo $contents['name'] ?></h1>
            <h2 class="subtitle"><?php echo $contents['job'] ?></h2>
            <img class="scrolldown" src="/public/images/gifs/scroll_down.gif" alt="Scrolldown for more">
        </div>
        <main>
            <section class="about">
                <h2><?php echo $contents['about_title'] ?></h2>
                <div class="non-text" id="contact-methods">
                    <img src="/public/images/foto.jpg" alt="Image of me" class="non-text__image">
                    <div class="buttons">
                        <a href="https://github.com/Luseres" target="_blank"><button class="buttons__button"><?php echo $contents['github_button']; ?></button></a>
                        <a href="<?php echo $contents['cv_url'] ?>" target="_blank"><button class="buttons__button button--action"><?php echo $contents['cv_button'] ?></button></a>
                    </div>
                    <div class="media">
                        <a href="mailto:joshua@jvdpoll.nl" target="_blank">
                            <div class="media__icon"><img src="/public/images/icons/email.png" alt="Email icon"></div>
                        </a>
                        <a href="https://www.linkedin.com/in/joshuavdpoll" target="_blank">
                            <div class="media__icon"><img src="/public/images/icons/linkedin.png" alt="Linkedin icon"></div>
                        </a>
                        <a href="https://wa.me/31637788390" target="_blank">
                            <div class="media__icon"><img src="/public/images/icons/whatsapp.png" alt="Whatsapp icon"></div>
                        </a>
                    </div>
                </div>
                <div class="text-info">
                    <h3 class="title"><?php echo $contents['job'] ?></h3>
                    <p class="information"><?php echo $contents['about_text'] ?></p>
                </div>
            </section>
            <section class="skills">
                <h2><?php echo $contents['skills_title'] ?></h2>
                <div class="skills__list">
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/backend.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Backend</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">PHP, SQL</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">REST API, JSON</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">MVC, OPP</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/frontend.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Frontend</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">HTML, CSS, SASS</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">JavaScript, jQuery</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Responsive, Minification</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/seo.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Ranking, Analytics</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Search Engine Optimization</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">OS/Browser Support</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">User Statistics</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/hardware.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Server Managment</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Ubuntu, Debian</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Apache2, MySQL</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Anti DDOS & DOS</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/security.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Security</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">SQL, XSS Injection</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Encryption, Hashing</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Bot & Spam Check</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills__skill">
                        <img class="skills__image" src="/public/images/skills/software.png" alt="Skill image">
                        <div class="skills__information">
                            <h3 class="skills__type">Software</h3>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Java</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Microsoft Visual Basic</p>
                            </div>
                            <div class="skills__subinfo">
                                <img class="skills__checkmark" src="/public/images/skills/check.png" alt="Checkmark">
                                <p class="skills__tech">Web App IOS/Android</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="projects">
                <h2><?php echo $contents['projects_title'] ?></h2>
                <div class="projects__list">
                    <?php foreach ($randProjects as $project) { ?>
                        <a href="/project/<?php echo strtolower($project['title']) ?>">
                            <div class="projects__project">
                                <div class="projects__top">
                                    <img alt="<?php echo $project['name'] ?>" class="projects__image" src="<?php echo (file_exists($_SERVER['DOCUMENT_ROOT'] . "/public/images/projects/" . $project['image']) == "" ? "https://via.placeholder.com/300x200" : "/public/images/projects/" . $project['image']); ?>" alt="">
                                </div>
                                <div class="projects__bottom">
                                    <p class="projects__title"><?php echo $project['title'] ?></p>
                                    <p class="projects__description"><?php echo text_trim($project[$lang]['description'], 246) ?></p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <a href="projects"><button class="projects__show-more"><?php echo $contents['more_button']; ?></button></a>
            </section>
        </main>
</body>
<?php
include "footer.php";
?>