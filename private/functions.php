<?php


//Get website info
function getDescription($lang, $page) {
    $page = str_replace('/', '', $page);
    if($page == "home") {
        if($lang == "Dutch") {
            return "Mijn naam is Joshua van der Poll. Ik ben een full-stack web developer in het gebied van Amsterdam. Ik heb momenteel studie op het Media College.";
        } else {
            return "My name is Joshua van der Poll. I'm a full-stack web developer in the region of Amsterdam. I'm currently studying web development at Media College.";
        }
    } else if($page == "project") {
        if(isset($_GET['project_id'])) {
            $project = getProject($_GET['project_id']);
            if($lang == "Dutch") {
                $description = strlen($project['description']) > 120 ? substr($project['description'], 0, 120) . "..." : $project['description'];
                return $description;
            } else {
                $description = strlen($project['description_en']) > 120 ? substr($project['description_en'], 0, 120) . "..." : $project['description_en'];
                return $description;
            }
        }
    } else {
        return "Joshua van der Poll • " . ucfirst($page);
    }
}
function getTitle($lang, $page) {
    $page = str_replace('/', '', $page);
    if($page == "home") {
        if($lang == "Dutch") {
            return "Joshua van der Poll • Fullstack Developer";
        } else {
            return "Joshua van der Poll • Fullstack Developer";
        }
    } else if($page == "project") {
        if(isset($_GET['project_id'])) {
            $project = getProject($_GET['project_id']);
            return "Joshua van der Poll • " . ucfirst($project['title']);
        }
    } else {
        return "Joshua van der Poll • " . ucfirst($page);
    }
}
function getAuthor() {
    return "Joshua van der Poll";
}
function getKeywords() {
	return "Joshua, Joshua van der Poll, Joshua vd Poll, Joshuavanderpoll, joshuavanderpoll, Joshuavdpoll, Front end Developer, Back end Developer, Full stack Developer, Media Developer, Developer, Fullstack, Full-Stack, Front-end, Back-end, websites, website, developer, front-end developer, back-end developer, full-stack developer, amsterdam, haarlem, noord-holland, noordholland";
}
function getConfig() {
    $config = [
        'inline_css' => true,
        'minify_page' => true,
        'minify_css' => true,
        'display_php_errors' => true
    ];
    return $config;
}




//SQL Connections and functions
function dbConnect() {
    $host = 'localhost';
    $database = 'HIDDEN';
    $user = 'HIDDEN';
    $password = 'HIDDEN';
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
        $connection = new PDO( $dsn, $user, $password );
        $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        return $connection;
    } catch ( \PDOException $e ) {
        echo 'There is occured error while connecting to SQL: ' . $e->getMessage();
    }
}
//SQL Log user
function ipUnique($ip) {
    $db = dbConnect();
    $found = false;
    $query = $db->prepare("SELECT `HIDDEN` FROM `HIDDEN` WHERE `HIDDEN` = ?");
    $query->execute(array($ip));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $found = true;
    }
    return $found;
}
function logUniqueIp($ip) {
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO `HIDDEN`(`HIDDEN`) VALUES (?)");
    $query->execute(array($ip));
}
function logUser($ip, $useragent, $source) {
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO `HIDDEN`(`HIDDEN`, `HIDDEN`, `HIDDEN`) VALUES (?,?,?)");
    $query->execute(array($ip, $useragent, $source));
    if(ipUnique($ip)) {
        logUniqueIp($ip);
    }
}


//SQL General content
function getContent($lang) {
    $db = dbConnect();
    if($lang == "Dutch") {
        $query = $db->prepare("SELECT * FROM `HIDDEN`");
    } else {
        $query = $db->prepare("SELECT * FROM `HIDDEN`");
    }
    $query->execute();
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        return $results;
    }
}
//SQL Project content
function projectExists($id) {
    $db = dbConnect();
    $found = false;

    $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
    $query->execute(array($id));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $found = true;
    }
    return $found;
}
function getProject($id) {
    if(projectExists($id)) {
        $db = dbConnect();
        $result = [];

        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
        $query->execute(array($id));
        while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
            $result['id'] = $results['id'];
            $result['title'] = $results['title'];
            $result['subtitle'] = $results['subtitle'];
            $result['description'] = $results['description'];
            $result['description_en'] = $results['description_en'];
            $result['website'] = $results['website'];
            $result['code'] = $results['code'];
            $result['source_code'] = $results['source_code'];
        }
        return $result;
    }
}
function getProjects() {
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM `HIDDEN`");
    $query->execute();
    $result = [];
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $results;
    }
    return $result;
}
function getProjectThumbnail($id) {
    if(projectExists($id)) {
        $db = dbConnect();
        $result = "";

        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ? AND `HIDDEN` = `HIDDEN`");
        $query->execute(array($id));
        while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
            $result = $results['image'];
        }
        return $result;
    }
}
function getProjectImages($id) {
    if(projectExists($id)) {
        $db = dbConnect();
        $images = [];

        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
        $query->execute(array($id));
        while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
            $images[] = $results['image'];
        }
        return $images;
    }
}
function getProjectTeam($id) {
    if(projectExists($id)) {
        $db = dbConnect();
        $team = [];

        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
        $query->execute(array($id));
        $i = 0;
        while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            $team[$i]['image'] = $results['image'];
            $team[$i]['name'] = $results['name'];
            $team[$i]['task'] = $results['task'];
            $team[$i]['link'] = $results['link'];
        }
        return $team;
    }
}
function getProjectsByTag($tag) {
    $db = dbConnect();
    $result = [];
    $result2 = [];
    $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
    $query->execute(array($tag));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $results;
    }
    foreach ($result as $project) {
        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ?");
        $query->execute(array($project['project_id']));
        while ($results2 = $query->fetch(PDO::FETCH_ASSOC)) {
            $result2[] = $results2;
        }
    }
    return $result2;
}
//Compression snippets
function minifyCSS($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//','',$css);
    $css = preg_replace('/\s{2,}/',' ',$css);
    $css = preg_replace('/\s*([:;{}])\s*/','$1',$css);
    $css = preg_replace('/;}/','}',$css);
    return $css;
}