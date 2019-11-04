<?php

function getDescription() {
	return "Hello! My name is Joshua van der Poll based in Velserbroek (Netherlands). I’m a full-stack media developer student at Mediacollege Amsterdam. I describe myself as a developer who loves coding and learning new knowledge.";
}
function getTitle() {
	return "Joshua van der Poll's Fullstack Media Developer Portfolio.";
}
function getAuthor() {
	return "Joshua van der Poll";
}
function getKeywords() {
	return "Joshua, Joshua van der Poll, Joshua vd Poll, Joshuavanderpoll, joshuavanderpoll, Joshuavdpoll, Front end Developer, Back end Developer, Full stack Developer, Media Developer, Developer, Luseres";
}

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

        $query = $db->prepare("SELECT * FROM `HIDDEN` WHERE `HIDDEN` = ? AND `HIDDEN` = 'HIDDEN'");
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