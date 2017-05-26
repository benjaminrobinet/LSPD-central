<?php

    function identifiantExists($identifiant){
        global $db;

        $db->prepare('SELECT id FROM agent WHERE identifiant = :identifiant');
        $rep = $db->execute(array(":identifiant" => $identifiant));
        if($rep == null){
            return false;
        } else {
            return false;
        }
    }

    function addAgent($data){
        global $db;

        $db->prepare('INSERT INTO agent (identifiant, email, prenom, nom, grade, accreditation) VALUES (:identifiant, :email, :prenom, :nom, :grade, :accreditation)');
        $rep = $db->execute($data);
        return $rep;
    }

    function getAgents(){
        global $db;

        $db->prepare('SELECT identifiant, prenom, nom, grade, accreditation FROM agent');
        $req = $db->execute();
        $rep = $req->fetchAll(PDO::FETCH_ASSOC);
        return $rep;
    }