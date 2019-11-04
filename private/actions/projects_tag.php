<?php

if (isset($_GET['t'])) {
	require "../functions.php";

	$tag = $_GET['t'];
	$results = [];

	switch ($tag) {
		case 'all':
			$results = getProjects();
			break;
		case 'frontend':
			$results = getProjectsByTag('frontend');
			break;
		case 'backend':
			$results = getProjectsByTag('backend');
			break;
		case 'app':
			$results = getProjectsByTag('app');
			break;
		case 'school':
			$results = getProjectsByTag('school');
			break;
	}
	foreach ($results as $project) {
		$thumb = getProjectThumbnail($project['id']);
		echo '<a style="color: #FFF" href="project?p='.$project['id'].'"><div class="project">
				<img alt="project preview" src="'.$thumb.'">
				<div class="overlay"></div>
				<p>'.$project['title'].'</p>
			</div></a>';
	}

} else {
	echo "No GET variable found.";
}



?>