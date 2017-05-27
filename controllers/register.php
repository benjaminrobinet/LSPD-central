<?php
$settings = array(
    "title" => "Administration"
);
// $query: admin/$0/$1/$2/.../$n

$msgs = array();
if($query[0] == "add"){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['grade']) && !empty($_POST['accreditation'])){
        if(identifiantExists($_POST['identifiant'])){
            array_push($msgs, array("message" => "exists"));
        } else {
            $data = array(
                ":identifiant" => $_POST['identifiant'],
                ":email" => $_POST['email'],
                ":prenom" => $_POST['prenom'],
                ":nom" => $_POST['nom'],
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
}
if($query[0] == "edit"){
    if(isset($query[1]) && is_numeric($query[1])){
        if(isset($query[2]) && $query[2] == "delete"){
            if(removeAgent($query[1])){
                array_push($msgs, array("message" => "deleted"));
            } else {
                array_push($msgs, array("message" => "notdeleted"));

            }
        } elseif($query[2] == "edit") {
            if(!empty($_POST['identifiant']) && !empty($_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['grade']) && !empty($_POST['accreditation'])){
                if(isset($_POST['active'])){
                    $active = 1;
                } else {
                    $active = 0;
                }
                if(identifiantExists($_POST['identifiant']) && (getAgent($query[1])[0]['identifiant'] != $_POST['identifiant'])){
                    array_push($msgs, array("message" => "exists"));
                } else {
                    $data = array(
                        ":identifiant" => $_POST['identifiant'],
                        ":email" => $_POST['email'],
                        ":prenom" => $_POST['prenom'],
                        ":nom" => $_POST['nom'],
                        ":grade" => $_POST['grade'],
                        ":accreditation" => $_POST['accreditation'],
                        ":active" => $active,
                        ":id" => $query[1]
                    );
                    if(editAgent($data)){
                        array_push($msgs, array("message" => "updated"));
                    } else {
                        array_push($msgs, array("message" => "notupdated"));
                    }
                }
            }
            $agent = getAgent($query[1])[0];
        }
    } elseif(!isset($query[1])){
        $agents = getAgents('*');
    }
}

