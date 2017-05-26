<?php
    $page = array(
        "title" => "Connexion"
    )
?>


<?php
    $errors = array();
    if(isset($_POST['identifiant']) && isset($_POST['password'])){
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        secure($identifiant);
        secure($password);
        if(checkAccount($_POST['identifiant'], $_POST['password'])){
            setSession($identifiant);
            header('Location: ./home');
        } else {
            $errors = array(
                "Verifiez vos identifiants."
            );
        }
    }
?>