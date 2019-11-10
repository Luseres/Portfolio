<?php
$content = getContent($_POST['lang']);
?>
<body>
	<main>
		<div class="welcome">
			<div class="content">
				<header>
					<a href="/"><img title="Logo" alt="logo" class="logo" data-lazy="public/img/logo.svg" src="public/img/placeholder.png"></a>
					<p id="header_text" style="visibility: hidden;">Joshua van der Poll</p>
					<button onclick="location.href='contact'">Contact me</button>
				</header>
				<h1 id="title" class="title"><?php echo $content['name'] ?></h1>
				<h2><?php echo $content['job'] ?></h2>
			</div>
		</div>
		<div id="about" class="about">
			<h2><?php echo $content['about_title'] ?></h2>
			<div class="information">
				<div class="left">
					<img title="Picture of me" alt="joshua van der poll" data-lazy="public/img/joshuavdpoll.jpg" src="public/img/placeholder.png">
				</div>
				<div class="right">
					<h3><?php echo $content['job'] ?>.</h3>
					<p><?php echo $content['about_text'] ?></p>
					<button onclick="window.open('<?php echo $content['cv_url'] ?>');"><?php echo $content['cv_button'] ?></button>
				</div>
			</div>
		</div>
		<div id="skills" class="skills">
			<h2><?php echo $content['skills_title'] ?></h2>
			<div class="container">
				<div class="skill">
					<img title="Skill frontend" alt="skill image" class="skillimg" data-lazy="public/img/skills/frontend.png" src="public/img/placeholder.png">
					<h3>Frontend</h3>
					<div class="sub">
						<img title="Skill 0" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>HTML5, CSS3, SASS</p>
					</div>
					<div class="sub">
						<img title="Skill 1" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>JavaScript, jQuery</p>
					</div>
					<div class="sub">
						<img title="Skill 2" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Responsive, Minification</p>
					</div>
				</div>
				<div class="skill">
					<img title="Skill backend" alt="skill image" class="skillimg" data-lazy="public/img/skills/backend.png" src="public/img/placeholder.png">
					<h3>Backend</h3>
					<div class="sub">
						<img title="Skill 3" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>PHP, SQL</p>
					</div>
					<div class="sub">
						<img title="Skill 4" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>REST API's</p>
					</div>
				</div>
				<div class="skill">
					<img title="Skill SEO" alt="skill image" class="skillimg" data-lazy="public/img/skills/seo.png" src="public/img/placeholder.png">
					<h3>Analytics</h3>
					<div class="sub">
						<img title="Skill 5" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Search Engine Optimization</p>
					</div>
					<div class="sub">
						<img title="Skill 6" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>User Statistics</p>
					</div>
				</div>
				<div class="skill">
					<img title="Skill security" alt="skill image" class="skillimg" data-lazy="public/img/skills/security.png" src="public/img/placeholder.png">
					<h3>Cyber Security</h3>
					<div class="sub">
						<img title="Skill 7" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>SQL Injection</p>
					</div>
					<div class="sub">
						<img title="Skill 8" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>XSS Injection</p>
					</div>
					<div class="sub">
						<img title="Skill 9" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Encryption, Hashing</p>
					</div>
				</div>
				<div class="skill">
					<img title="Skill software" alt="skill image" class="skillimg" data-lazy="public/img/skills/software.png" src="public/img/placeholder.png">
					<h3>Software</h3>
					<div class="sub">
						<img title="Skill 10" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Java</p>
					</div>
					<div class="sub">
						<img title="Skill 11" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Microsoft VB.Net</p>
					</div>
				</div>
				<div class="skill">
					<img title="Skill hardware" alt="skill image" class="skillimg" data-lazy="public/img/skills/hardware.png" src="public/img/placeholder.png">
					<h3>Hardware</h3>
					<div class="sub">
						<img title="Skill 12" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Arduino, NodeMCU</p>
					</div>
					<div class="sub">
						<img title="Skill 13" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>PCB (Hardware Chips)</p>
					</div>
					<div class="sub">
						<img title="Skill 14" alt="check" data-lazy="public/img/check.svg" src="public/img/placeholder.png">
						<p>Internet of Things</p>
					</div>
				</div>
			</div>
		</div>
		<div id="portfolio" class="portfolio">
			<h2>Portfolio</h2>
			<div class="buttons">
				<button onclick="sort_all();">ALL</button>
				<button onclick="sort_backend();">BACKEND</button>
				<button onclick="sort_frontend();">FRONTEND</button>
				<button onclick="sort_apps();">APPS</button>
				<button onclick="sort_school();">SCHOOL</button>
			</div>
			<div class="projects">
				<?php 
				$projects = getProjects();
				foreach ($projects as $project) {
					$thumb = getProjectThumbnail($project['id']);
					echo '<a hreflang="en" title="View '.$project['title'].'" style="color: #FFF" href="project?project_id='.$project['id'].'"><div class="project">
							<img title="Thumbnail '.$project['title'].'" alt="project preview" src="public/img/placeholder.png" data-lazy="'.$thumb.'">
							<div class="overlay"></div>
							<p>'.$project['title'].'</p>
						</div></a>';
				}
				?>
			</div>
		</div>
	</main>
	<footer>
		<a hreflang="en" hidden title="Open instagram" target="_blank" href="https://instagram.com/joshua_vdpoll/">Instagram</a>
		<a hreflang="en" hidden title="Open facebook" target="_blank" href="https://www.facebook.com/joshua.vanderpoll.5">Facebook</a>
		<a hreflang="en" hidden title="Open email" target="_blank" href="mailto:joshua@jvdpoll.nl">Email</a>
		<a hreflang="en" hidden title="Open whatsapp" target="_blank" href="https://wa.me/31637788390">Whatsapp</a>
		<a hreflang="en" hidden title="Open snapchat" target="_blank" href="public/img/snapcode.svg">Snapchat</a>
		<a hreflang="en" hidden title="Open linkedin" target="_blank" href="https://www.linkedin.com/in/joshuavdpoll/">Linkedin</a>
		<a hreflang="en" hidden title="Open twitter" target="_blank" href="https://twitter.com/Luseres_">Twitter</a>
		<a hreflang="en" hidden title="Open youtube" target="_blank" href="https://www.youtube.com/channel/UCP05TkaljaRlHfhSzIUtGIw">Youtube</a>
	</footer>
	<script>
		const targets = document.querySelectorAll('img');
		const lazyLoad = target => {
		    const io = new IntersectionObserver((entries, observer) => {
		        entries.forEach(entry => {
		            if (entry.isIntersecting) {
		                const img = entry.target;
		                const src = img.getAttribute('data-lazy');
		                img.setAttribute('src', src);
		                observer.disconnect();
		            }
		        });
		    });
		    io.observe(target)
		};
		targets.forEach(lazyLoad);

		window.dataLayer = window.dataLayer || [];

		function gtag() {
		    dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-151534947-1');

		var headerTextMenu = document.getElementById("header_text"),
		    headerText = document.getElementById("title");

		function scrollEvent() {
			if(160 < this.pageYOffset) {
				headerTextMenu.style.visibility = "visible";
				headerText.style.visibility = "hidden";
			} else {
				headerTextMenu.style.visibility = "hidden";
				headerText.style.visibility = "visible";
			}
		}
		window.addEventListener("scroll", function() {
		    scrollEvent()
		}, !1);

		function sort_all() {
		    $.ajax({
		        url: "/private/actions/projects_tag.php?t=all"
		    }).done(function(a) {
		        $(".projects").html(a)
		    })
		}
		function sort_frontend() {
		    $.ajax({
		        url: "/private/actions/projects_tag.php?t=frontend"
		    }).done(function(a) {
		        $(".projects").html(a)
		    })
		}
		function sort_backend() {
		    $.ajax({
		        url: "/private/actions/projects_tag.php?t=backend"
		    }).done(function(a) {
		        $(".projects").html(a)
		    })
		}
		function sort_apps() {
		    $.ajax({
		        url: "/private/actions/projects_tag.php?t=app"
		    }).done(function(a) {
		        $(".projects").html(a)
		    })
		}
		function sort_school() {
		    $.ajax({
		        url: "/private/actions/projects_tag.php?t=school"
		    }).done(function(a) {
		        $(".projects").html(a)
		    })
		};
	</script>
</body>