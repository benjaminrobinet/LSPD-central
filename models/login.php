<?php
    function checkAccount($identifiant, $password){
        global $db;

        $db->prepare('SELECT * FROM agent WHERE identifiant = :identifiant AND password = :password');
        $data = $db->execute(array(':identifiant' => $identifiant, ':password' => $password));
        if(!$data){
            return false;
        } else {
            return true;
        }
    }

    function setSession($identifiant){
        global $db;
        global $session;

        $db->prepare('SELECT * FROM agent WHERE identifiant = :identifiant');
        $req = $db->execute(array(':identifiant' => $identifiant));
        $rep = $req->fetchAll();
        $user = $rep[0];
        $session->id = $user['id'];
        $session->prenom = $user['prenom'];
        $session->nom = $user['nom'];
        $session->grade = $user['grade'];
        $session->accreditation = $user['accreditation'];
    }
?>