<?php 

if (!isset($_GET['p'])) {
	echo '<script type="text/javascript">window.location.href = "not_found"</script>';
	return;	
}
if(!projectExists($_GET['p'])) {
	echo '<script type="text/javascript">window.location.href = "not_found"</script>';
	return;	
}
$info = getProject($_GET['p']);
$thumbnail = getProjectThumbnail($_GET['p']);
$images = getProjectImages($_GET['p']);
$team = getProjectTeam($_GET['p']);

?>
<body>
	<main>
		<div class="welcome">
			<div class="content">
				<header>
					<a href="/"><img alt="logo" class="logo" src="public/img/logo.svg"></a>
					<h1 id="header_text">Joshua van der Poll</h1>
					<a href="contact"><button>Contact me</button></a>
				</header>
				<h1><?php echo $info['title']; ?></h1>
				<h2><?php echo $info['subtitle']; ?></h2>
			</div>
		</div>
		<div class="basic">
			<div>
				<img src="<?php echo $thumbnail; ?>" alt="tumbnail">
			</div>
			<div>
				<h2>What's this project?</h2>
				<p><?php echo $info['description']; ?></p>
				<a href="<?php echo $info['website']; ?>" target="_blank"><button>VISIT WEBSITE</button></a>
				<a href="<?php echo $info['source_code']; ?>" target="_blank"><button>SOURCE CODE</button></a>
				<div class="code">
					<?php 

					$code = $info['code'];
					$code = explode(', ', $code);


					foreach ($code as $lang) {
						echo '<p>'.$lang.'</p>';
					}

					?>
				</div>
			</div>
		</div>
		<div class="work">
			<h2>View our work:</h2>
			<?php
			foreach ($images as $image) {
				echo '<img src="'.$image.'" alt="tumbnail">';
			}
			?>
		</div>
		<div class="team">
			<h2>View our team:</h2>
			<div class="members">
				<?php

				foreach ($team as $member) {
					echo '<a href="'.$member['link'].'"><div class="person">
							<img src="'.$member['image'].'" alt="person">
							<h3>'.$member['name'].'</h3>
							<p>'.$member['task'].'</p>
						</div></a>';
				}


				?>
				
			</div>
		</div>
	</main>
</body>