<?php



function dbConnect()
{
    $host = '';
    $database = '';
    $user = '';
    $password = '';
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
        $connection = new PDO($dsn, $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $connection;
    } catch (\PDOException $e) {
        echo 'There is occured error while connecting to SQL: ' . $e->getMessage();
    }
}

function getProjects()
{
    $json = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/public/json/projects.json");
    $decoded = json_decode($json, true);
    return $decoded;
}
function getRandomProjects($amount)
{
    $randSelected = [];
    $projects = getProjects();
    $randomized = array_rand($projects, $amount);
    for ($i = 0; $i < sizeof($randomized); $i++) {
        $randSelected[] = $projects[$randomized[$i]];
    }
    return $randSelected;
}
function projectExists($name)
{
    $existing_projects = getProjects();
    $exists = false;
    foreach ($existing_projects as $project) {
        if (strtolower($project['title']) == $name) {
            $exists = true;
        }
    }
    return $exists;
}
function getProjectByName($name)
{
    $result_project = [];
    if (projectExists($name)) {
        $projects = getProjects();
        foreach ($projects as $project) {
            if (strtolower($project['title']) == $name) {
                $result_project = $project;
            }
        }
    }
    return $result_project;
}

function getContents($language)
{
    $json = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/public/json/contents.json");
    $decoded = json_decode($json, true);
    return $decoded[$language];
}

function getClientLang()
{
    $lang = "english";
    if (isset($_COOKIE['lang'])) {
        if (strlen($_COOKIE['lang']) > 1) {
            $lang = $_COOKIE['lang'];
        }
    } else {
        $json = file_get_contents('https://www.iplocate.io/api/lookup/' . $_SERVER['REMOTE_ADDR']);
        $decoded = json_decode($json, true);
        if ($decoded['country'] == "Netherlands") {
            $lang = "dutch";
        }
    }
    return strtolower($lang);
}

function debug($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
function text_trim($string, $amount)
{
    return (strlen($string) > 20) ? substr($string, 0, $amount) . '...' : $string;
}
function redirect($url)
{
    $script = '<script type="text/javascript">window.location = "' . $url . '"</script>';
    echo $script;
}
