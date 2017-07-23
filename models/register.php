<?php

function idExists($id){
    global $db;

    $db->prepare('SELECT id FROM citiz WHERE id = :id');
    $rep = $db->execute(array(":id" => $id));
    if($rep == null){
        return false;
    } else {
        return true;
    }
}

function addCitizen($data){
    global $db;

    $db->prepare('INSERT INTO citiz (prenom, nom, age, sexe, ethnie, cheveux, profession) VALUES (:prenom, :nom, :age, :sexe, :ethnie, :cheveux, :profession)');
    $db->execute($data);
    $db->prepare('SELECT LAST_INSERT_ID()');
    $rep = $db->execute();
    return $rep;
}

function getLineNb(){
    global $db;

    $db->prepare('SELECT COUNT(*) FROM citiz');
    $rep = $db->execute();
    return $rep;
}

function getRegistre($offset = 0, $nbLine = 50){
    global $db;

    $db->prepare('SELECT * FROM citiz ORDER BY prenom LIMIT '.$nbLine.' OFFSET '.$offset);
    $rep = $db->execute();
    return $rep;
}

function removeCitizen($id){
    global $db;

    $db->prepare('DELETE FROM citiz WHERE id = :id');
    $rep = $db->execute(array(':id' => $id));
    return $rep;
}

function getCitizen($id){
    global $db;

    $db->prepare('SELECT * FROM citiz WHERE id = :id');
    $rep = $db->execute(array(":id" => $id));

    return $rep;
}

function editCitizen($data){
    global $db;

    $db->prepare('UPDATE citiz SET prenom = :prenom, nom = :nom, age = :age, sexe = :sexe, ethnie = :ethnie, cheveux = :cheveux, profession = :profession WHERE id = :id');
    $rep = $db->execute($data);

    return $rep;
}