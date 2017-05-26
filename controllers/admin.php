<?php
$settings = array(
    "title" => "Administration"
);
if(!$session->id){
    header('Location: '.WEBROOT);
}