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
        private function setAccreditation($value){
            if($this->session){ 
                $this->accreditation = $_SESSION['accreditation'] = $value;
            }
            return $this->accreditation;
        }


        private function getId(){
            if($this->session){
                if(!$this->id){
                    if(isset($_SESSION['id'])){
                        $this->id = $_SESSION['id'];
                    }
                }
            }
            return $this->id;
        }
        public function getPrenom(){
            if($this->session){ 
                if(!$this->prenom){
                    if(isset($_SESSION['prenom'])){
                        $this->prenom = $_SESSION['prenom'];
                    }
                }
            }
            return $this->prenom;
        }
        private function getNom(){
            if($this->session){ 
                if(!$this->nom){
                    if(isset($_SESSION['nom'])){
                        $this->nom = $_SESSION['nom'];
                    }
                }
            }
            return $this->nom;
        }
        private function getGrade(){
            if($this->session){ 
                if(!$this->grade){
                    if(isset($_SESSION['grade'])){
                        $this->grade = $_SESSION['grade'];
                    }
                }
            }
            return $this->grade;
        }
        private function getAccreditation(){
            if($this->session){ 
                if(!$this->accreditation){
                    if(isset($_SESSION['accreditation'])){
                        $this->accreditation = $_SESSION['accreditation'];
                    }
                }
            }
            return $this->accreditation;
        }
        
        private function getSession(){
            return $this->session;
        }
    }
?>