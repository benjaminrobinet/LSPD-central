<?php
    function autoload($class){
        require_once 'app/' . $class . '.php';
    }
    spl_autoload_register('autoload');

    function var_dmp(){
        if ( func_num_args() > 0 ){
            foreach(func_get_args() as $arg){
                echo "<pre>";
                var_dump($arg);
                echo "</pre>";
            }
        }
    }

    // define constants
    define('PROJECT_DIR', realpath('./'));
    define('LOCALE_DIR', PROJECT_DIR . '/locales');
    define('DEFAULT_LOCALE', 'en_US');

    require_once('./lib/gettext/gettext.inc');

    $encoding = 'UTF-8';

    $locale = 'en_US';

    T_setlocale(LC_MESSAGES, $locale);
    $domain = 'locale';
    bindtextdomain($domain, LOCALE_DIR);
    if (function_exists('bind_textdomain_codeset')) 
      bind_textdomain_codeset($domain, $encoding);
    textdomain($domain);
    
    $session = new Session();
    $db = new Database();
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'home';
    }
    if(substr($page, -4) == '.php') {
        $page = substr_replace($page, '', -4);
    }

    $controller = __DIR__ . '/controllers/' . $page . '.php';
    $view = __DIR__ . '/pages/' . $page . '.php';

    require_once($controller);
    require_once($view);
?>