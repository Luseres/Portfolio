<?php 

if (!isset($_GET['project_id'])) {
	echo '<script type="text/javascript">window.location.href = "not_found"</script>';
	return;	
}
if(!projectExists($_GET['project_id'])) {
	echo '<script type="text/javascript">window.location.href = "not_found"</script>';
	return;	
}
$info = getProject($_GET['project_id']);
$thumbnail = getProjectThumbnail($_GET['project_id']);
$images = getProjectImages($_GET['project_id']);
$team = getProjectTeam($_GET['project_id']);

?>
<body>
    <main>
        <div class="welcome">
            <div class="content">
                <header>
                    <a itemprop="url" hreflang="en" title="Return to home" href="/"><img title="Website logo" alt="logo" class="logo" src="public/img/logo.svg"></a>
                    <button onclick="location.href='contact'">Contact me</button>
                </header>
                <h1><?php echo $info['title']; ?></h1>
                <h2><?php echo $info['subtitle']; ?></h2></div>
        </div>
        <div class="basic">
            <div> <img title="Main image" src="<?php echo $thumbnail; ?>" alt="tumbnail"></div>
            <div>
                <h2><?php echo($_POST['lang'] !== "Dutch" ? "What's this project?" : "Wat is dit project?") ?></h2>
                <p>
                    <?php 
                    if($_POST['lang'] == "Dutch") {
                        echo $info['description'];
                    } else {
                        echo $info['description_en'];
                    }
                    
                    ?>
                </p>
                <a itemprop="url" hreflang="en" title="Visit project website" href="<?php echo $info['website']; ?>" target="_blank">
                    <button><?php echo($_POST['lang'] !== "Dutch" ? "VISIT WEBSITE" : "BEZOEK WEBSITE") ?></button>
                </a>
                <a itemprop="url" hreflang="en" title="Visit project source code" href="<?php echo $info['source_code']; ?>" target="_blank">
                    <button>SOURCE CODE</button>
                </a>
                <div class="code">
                    <?php $code = $info['code']; $code = explode(', ', $code);foreach ($code as $lang) { echo '<p>'.$lang.'</p>'; }?>
                </div>
            </div>
        </div>
        <div class="work">
            <h2><?php echo($_POST['lang'] !== "Dutch" ? "View our work:" : "Bekijk ons werk:") ?></h2>
            <?php foreach ($images as $image) { echo '<img title="Preview image of project" src="'.$image.'" alt="tumbnail">'; } ?></div>
        <div class="team">
            <h2><?php echo($_POST['lang'] !== "Dutch" ? "View our team:" : "Bekijk ons team:") ?></h2>
            <div class="members">
                <?php foreach ($team as $member) { echo '<a itemprop="url" hreflang="en" title="Visit persons portfolio" target="_blank" href="'.$member['link'].'"><div class="person"> <img title="'.$member['name'].'" src="'.$member['image'].'" alt="person"><h3>'.$member['name'].'</h3><p>'.$member['task'].'</p></div></a>'; } ?></div>
        </div>
    </main>
</body>