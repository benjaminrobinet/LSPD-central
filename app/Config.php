<?php
    class Config{
        private $config;
        private $host;
        private $dbname;
        private $username;
        private $password;
        function __construct(){
            $file = file_get_contents('config.json');
            $config = json_decode($file, true);
            $this->config = $config;
            $this->host = $config['db']['host'];
            $this->dbname = $config['db']['name'];
            $this->username = $config['db']['username'];
            $this->password = $config['db']['password'];
        }
        
        function __get($key){
            $method = 'get' . ucfirst($key);
            return $this->$method();
        }
        
        private function getFull(){
            return $this->config;
        }
        
        private function getHost(){
            return $this->host;
        }
        
        private function getDbname(){
            return $this->dbname;
        }
        
        private function getUsername(){
            return $this->username;
        }
        
        private function getPassword(){
            return $this->password;
        }
    }
?>