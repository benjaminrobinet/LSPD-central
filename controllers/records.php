<?php
$settings = array(
    "title" => "Amender"
);
if(!$session->id){
    header('Location: '.WEBROOT);
}