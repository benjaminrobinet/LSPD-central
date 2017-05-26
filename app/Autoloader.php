<?php
    class Autoloader{
        function autoload($class){
            require_once 'app/' . $class . '.php';
        }

        public static function Init(){
            spl_autoload_register('autoload');
        }
    }
?>