<?php
    class Database extends PDO {

        private $db;
        private $host;
        private $dbname;
        private $username;
        private $password;
        private $error;
        private $req;
        private $rep;

        function __construct(){
            $config = new Config();
            $this->host = $config->host;
            $this->dbname = $config->dbname;
            $this->username = $config->username;
            $this->password = $config->password;
        }
        
        private function getPDO(){
            if($this->db === null){
                $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', '' . $this->username . '', '' . $this->password . '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $pdo;
            }
            return $this->db;
        }
        
        public function query($statement){
            $req = $this->getPDO()->query($statement);
            $this->req = $req;
            return $this->req->fetchAll();
        }
        
        public function prepare($statement, $opt = [null]){
            $req = $this->getPDO()->prepare($statement, $opt);
            $this->req = $req;
            return $this->req;
        }
        
        public function execute($opt = null){
            $this->req->execute($opt);
            $rep = $this->req->fetchAll(PDO::FETCH_ASSOC);
            $this->rep = $rep;
            return $this->rep;
        }
    }
?>