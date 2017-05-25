<?php
    $db->prepare('SELECT * FROM agent');
    $db->execute();
    $session->init();
    $session->grade = "Colonel";
    $session->nom = "Robinet";
?>