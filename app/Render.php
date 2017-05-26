<?php
    class Render{
        private $title;
        private $header;
        private $footer;
        private $template_path = WEBROOT . '/templates/';
        
        public function setController($controller){
            require_once $controller;
        }
        
        public function setView($header, $footer, $view){
            require_once $this->getHeader($header);
            require_once $view;
            require_once $this->getHeader($footer);
        }
        
        private function getHeader($file){
            $this->header = $this->template_path . $file . '.php';
            return $this->header;
        }
        
        private function getFooter($file){
            $this->footer = $template_path . $file . '.php';
            return $this->footer;
        }
    }
?>