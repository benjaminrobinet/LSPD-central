<?php
    class Session{
        private $session = false;
        private $id = null;    
        private $prenom = null;    
        private $nom = null;    
        private $grade = null;
        private $accreditation = null;
        
        public function __get($key){
            $method = 'get' . ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
        
        public function __set($key, $value){
            $method = 'set' . ucfirst($key);
            $this->$key = $this->$method($value);
            return $this->$key;
        }
        
        public function init(){
            session_start();
            $this->session = true;
        }
    
        public function destroy(){
            session_unset();
            session_destroy();
            $this->session = false;
        }
            
        private function setId($value){
            if($this->session){ 
                $this->id = $_SESSION['id'] = $value;
            }
            return $this->id;
        }
        private function setPrenom($value){
            if($this->session){ 
                $this->prenom = $_SESSION['prenom'] = $value;
            }
            return $this->prenom;
        }
        private function setNom($value){
            if($this->session){ 
                $this->nom = $_SESSION['nom'] = $value;
            }
            return $this->nom;
        }
        private function setGrade($value){
            if($this->session){ 
                $this->grade = $_SESSION['grade'] = $value;
            }
            return $this->grade;
        }
        private function setAccred($value){
            if($this->session){ 
                $this->accred = $_SESSION['accred'] = $value;
            }
            return $this->accred;
        }


        private function getId(){
            if($this->session){
                if($this->id){
                    $this->id = $_SESSION['id'];
                }
            }
            return $this->id;
        }
        private function getPrenom(){
            if($this->session){ 
                if($this->prenom){
                    $this->prenom = $_SESSION['prenom'];
                }
            }
            return $this->prenom;
        }
        private function getNom(){
            if($this->session){ 
                if($this->nom){
                    $this->nom = $_SESSION['nom'];
                }
            }
            return $this->nom;
        }
        private function getGrade(){
            if($this->session){ 
                if($this->grade){
                    $this->grade = $_SESSION['grade'];
                }
            }
            return $this->grade;
        }
        private function getAccred(){
            if($this->session){ 
                if($this->accred){
                    $this->accred = $_SESSION['accred'];
                }
            }
            return $this->accred;
        }
        
        private function getSession(){
            return $this->session;
        }
    }
?>