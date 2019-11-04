<body>
	<main>
		<div class="welcome">
			<div class="content">
				<header>
					<img alt="logo" class="logo" src="public/img/logo.svg">
					<h1 id="header_text" style="visibility: hidden;">Joshua van der Poll</h1>
					<a href="contact"><button>Contact me</button></a>
				</header>
				<h1 id="title" class="title">Joshua van der Poll</h1>
				<h2>Fullstack Media Developer</h2>
			</div>
		</div>
		<div id="about" class="about">
			<h2>About</h2>
			<div class="information">
				<div class="left">
					<img alt="joshua van der poll" src="public/img/joshuavdpoll.jpg">
				</div>
				<div class="right">
					<h3>Fullstack Developer</h3>
					<p>Hello! My name is <b>Joshua van der Poll</b> based in Velserbroek (Netherlands). I’m a fullstack media developer student at Mediacollege Amsterdam. I describe myself as a developer who loves coding and learning new knowledge. Having an in-depth knowledge including <b>HTML5</b>, <b>CSS3</b>, <b>JavaScript</b>, <b>PHP</b> and working knowledge of <b>Java</b> and <b>SEO</b>.<br><br>
					In my spare time, I like to create challenges for my self for example chat platforms, working IoT (Internet of Things) platforms and hardware.</p>
					<a href="public/doc/CV.pdf" target="_blank"><button>DOWNLOAD CV</button></a>
				</div>
			</div>
		</div>
		<div id="skills" class="skills">
			<h2>My Skills</h2>
			<div class="container">
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/frontend.png">
					<h3>Frontend</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>HTML5, CSS3, SASS</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>JavaScript, jQuery</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Responsive, Minification</p>
					</div>
				</div>
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/backend.png">
					<h3>Backend</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>PHP, SQL</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>REST API's</p>
					</div>
				</div>
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/seo.png">
					<h3>Analytics</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Search Engine Optimization</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>User Statistics</p>
					</div>
				</div>
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/security.png">
					<h3>Cyber Security</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>SQL Injection</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>XSS Injection</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Encryption, Hashing</p>
					</div>
				</div>
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/software.png">
					<h3>Software</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Java</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Microsoft VB.Net</p>
					</div>
				</div>
				<div class="skill">
					<img alt="skill image" class="skillimg" src="public/img/skills/hardware.png">
					<h3>Hardware</h3>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>Arduino, NodeMCU</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
						<p>PCB (Hardware Chips)</p>
					</div>
					<div class="sub">
						<img alt="check" src="public/img/check.svg">
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

					echo '<a style="color: #FFF" href="project?p='.$project['id'].'"><div class="project">
							<img alt="project preview" src="'.$thumb.'">
							<div class="overlay"></div>
							<p>'.$project['title'].'</p>
						</div></a>';
				}
				?>
			</div>
		</div>
	</main>
    <script type="text/javascript" src="public/js/home.js"></script>
</body>