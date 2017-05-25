<?php
    class Database extends PDO {
        private $db = null;
        private $error;
        private $req;
        private $rep;

        function __construct(){
            
        }
        
        private function getPDO(){
            if($this->db === null){
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=lspd_central', 'root', '');
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
            $rep = $this->req->fetchAll();
            $this->rep = $rep;
            return $this->rep;
        }
    }
?>