<?php
// Autoloader for App
function autoload($class){
    require_once 'app/' . $class . '.php';
}
spl_autoload_register('autoload');

// DEBUG FUNCTION (var_dump() enhanced)
function var_dmp(){
    if (func_num_args() > 0){
        foreach(func_get_args() as $arg){
            echo "<pre>";
            var_dump($arg);
            echo "</pre>";
        }
    }
}
// SETUP
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$webroot = $url;
$query = null;
// Architecture
if(isset($_GET['uri'])){
    $uristr = $_GET['uri'];
    $uri = explode('/', $uristr);
    $page = $uri[0];
    if(isset($uri[1])){
        $query = array_slice($uri,1);
    }
    $webroot = str_replace($uristr, '', $url);
} else {
    $page = 'home';
}
$webroot = rtrim($webroot, '/');
define('WEBROOT', $webroot);
$current = WEBROOT."/".$page;
$config = new Config();

function txt($string){
    echo _($string);
    return null;
}
function secure(&$string){
    $string = htmlspecialchars($string);
    return null;
}

// SETUP LOCALES
define('PROJECT_DIR', realpath('./'));
define('LOCALE_DIR', PROJECT_DIR . '/locales');
define('DEFAULT_LOCALE', 'fr_FR');
require_once('./lib/gettext/gettext.inc');
$encoding = 'UTF-8';
$locale = 'fr_FR';
T_setlocale(LC_MESSAGES, $locale);
$domain = 'locale';
bindtextdomain($domain, LOCALE_DIR);
if (function_exists('bind_textdomain_codeset'))
    bind_textdomain_codeset($domain, $encoding);
textdomain($domain);

$session = new Session(); // Init session
$session->init(); // Init session
$db = new Database(); // Init database

if(!$session->id && $page != "login"){
    $page = "home";
}

$model = __DIR__ . '/models/' . $page . '.php';
$controller = __DIR__ . '/controllers/' . $page . '.php';
$view = __DIR__ . '/pages/' . $page . '.php';
$header = __DIR__ . '/templates/header.php';
$footer = __DIR__ . '/templates/footer.php';
if(substr($page, -4) == '.php') {
    $page = substr_replace($page, '', -4);
}
if(file_exists($model)){
    require_once $model;
} else {
    echo "Erreur 404";
}
if(file_exists($controller)){
    require_once $controller;
} else {
    echo "Erreur 404";
}
if(file_exists($header)){
    require_once $header;
} else {
    echo "Erreur 404";
}
if(file_exists($view)){
    require_once $view;
} else {
    echo "Erreur 404";
}
if(file_exists($footer)){
    require_once $footer;
} else {
    echo "Erreur 404";
}
