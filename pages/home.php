<?php
    if($session->session === true){
        echo _("Hello") . ' ' . $session->grade . ' ' . $session->nom;
    }
?>