<?php

function identifiantExists($identifiant){
    global $db;

    $db->prepare('SELECT id FROM agent WHERE identifiant = :identifiant');
    $rep = $db->execute(array(":identifiant" => $identifiant));
    if($rep == null){
        return false;
    } else {
        return true;
    }
}

function addAgent($data){
    global $db;

    $db->prepare('INSERT INTO agent (identifiant, email, prenom, nom, grade, accreditation) VALUES (:identifiant, :email, :prenom, :nom, :grade, :accreditation)');
    $rep = $db->execute($data);
    return $rep;
}

function removeAgent($id){
    global $db;

    $db->prepare('DELETE FROM agent WHERE id = :id');
    $rep = $db->execute(array(':id' => $id));
    return $rep;
}

function getAgent($id){
    global $db;

    $db->prepare('SELECT * FROM agent WHERE id = :id');
    $req = $db->execute(array(":id" => $id));
    $rep = $req->fetchAll(PDO::FETCH_ASSOC);

    return $rep;
}

function editAgent($data){
    global $db;

    $db->prepare('UPDATE agent SET identifiant = :identifiant, email = :email, grade = :grade, nom = :nom, prenom = :prenom, accreditation = :accreditation, active = :active WHERE id = :id');
    $rep = $db->execute($data);

    return $rep;
}

function createToken($identifiant){
    require_once('./lib/random/random.php');
    $length = 32;
    $token = bin2hex(random_bytes($length));
    $db->prepare('INSERT INTO token (token, agent_id) VALUES (:token, :agent_id)');
    $rep = $db->execute(array(':token' => $token, 'agent_id'));

    if(!$rep){
        return false;
    } else {
        return $token;
    }
}

function sendMail($email, $token){
    $to = $email;
    $subject = 'LSPD Central - Créez votre mot de passe';
    $message = 'Cliquez sur ce lien pour créer votre mot de passe http://' . WEBROOT . '/generate/' . $token;
    $headers = "From: LSPD Central" . "\r\n";

    return mail($to, $subject, $message, $headers);
}

function getAgents($how = '25', $from = 0){
    global $db;
    if($how == '*'){
        $sql = 'SELECT id, identifiant, prenom, nom, grade, accreditation FROM agent';
    } else {
        $sql = 'SELECT id, identifiant, prenom, nom, grade, accreditation FROM agent LIMIT ' . $how . ' OFFSET ' . $from;
    }
    $db->prepare($sql);
    $req = $db->execute();
    $rep = $req->fetchAll(PDO::FETCH_ASSOC);
    return $rep;
}