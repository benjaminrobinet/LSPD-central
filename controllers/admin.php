<?php
$settings = array(
    "title" => "Administration"
);
if(!$session->id){
    header('Location: '.WEBROOT);
}

$msgs = array();
if(!empty($_POST['identifiant']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['grade']) && !empty($_POST['accreditation'])){
    if(identifiantExists($_POST['identifiant'])){
        array_push($msgs, array("message" => "exists"));
    } else {
        $data = array(
            ":identifiant" => $_POST['identifiant'],
            ":email" => $_POST['email'],
            ":prenom" => $_POST['firstname'],
            ":nom" => $_POST['lastname'],
            ":grade" => $_POST['grade'],
            ":accreditation" => $_POST['accreditation']
        );
        if(addAgent($data)){
            array_push($msgs, array("message" => "added"));
        } else {
            array_push($msgs, array("message" => "notadded"));
        }
    }
} else {
    if($_POST != null){
        array_push($msgs, array("message" => "form"));
    }
}