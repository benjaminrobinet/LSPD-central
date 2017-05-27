<?php

function addCitizen($data){
    global $db;

    $db->prepare('INSERT INTO citiz (prenom, nom, age, sexe, ethnie, cheveux, profession) VALUES (:prenom, :nom, :age, :sexe, :ethnie, :cheveux, :profession)');
    $rep = $db->execute($data);
    return $rep;
}