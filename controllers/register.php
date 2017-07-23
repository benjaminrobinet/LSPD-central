<?php
$settings = array(
    "title" => "Registre"
);
https://stackoverflow.com/questions/8550015/convert-jpg-gif-image-to-png-in-php
https://stackoverflow.com/questions/8550015/convert-jpg-gif-image-to-png-in-php
https://stackoverflow.com/questions/8550015/convert-jpg-gif-image-to-png-in-php
https://stackoverflow.com/questions/8550015/convert-jpg-gif-image-to-png-in-php
*/

$msgs = array();
if($query[0] == "" || $query[0] == "list"){
    $nbLine = getLineNb()->fetchAll(PDO::FETCH_COLUMN)[0];
    if(isset($_GET['nbperpage']) && $_GET['nbperpage'] == "all") {
        $nbPerPage = "all";
        $nbPage = 1;
    } elseif(isset($_GET['nbperpage']) && is_numeric($_GET['nbperpage'])) {
        $nbPerPage = $_GET['nbperpage'];
    } else {
        $nbPerPage = 50;
    }
    if(isset($query[1]) && is_numeric($query[1])){
        $currentPage = $query[1];
    } else {
        $currentPage = 1;
    }
    $nbPage = ($nbPerPage == "all") ? 1 : ceil($nbLine / $nbPerPage);
    $offset = ($currentPage-1) * ($nbPerPage);
    $limit = ($nbPerPage == "all") ? 999999999999 : $nbPerPage;
    $citizens = getRegistre($offset,$limit);
} elseif($query[0] == "add"){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['sexe']) && !empty($_POST['ethnie']) && !empty($_POST['cheveux']) && !empty($_POST['profession'])){
        $data = array(
            ":prenom" => $_POST['prenom'],
            ":nom" => $_POST['nom'],
            ":age" => $_POST['age'],
            ":sexe" => $_POST['sexe'],
            ":ethnie" => $_POST['ethnie'],
            ":cheveux" => $_POST['cheveux'],
            ":profession" => $_POST['profession']
        );

        $citizen = addCitizen($data);
        $citizenId = $citizen->fetchAll(PDO::FETCH_ASSOC)[0]['LAST_INSERT_ID()'];
        if($citizen){
            array_push($msgs, array("message" => "added"));
        } else {
            array_push($msgs, array("message" => "notadded"));
        }
        if(isset($_FILES['photo'])){
            $file = $_FILES['photo'];
            $uploads_dir = ROOT . '/uploads';
            if($file['type'] == ("image/jpeg" || "image/png")){
                $tmp_name = $file['tmp_name'];
                $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
                $id = $citizenId;
                $name = "$id.$ext";
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
            }
        }
    }else {
        if($_POST != null){
            array_push($msgs, array("message" => "form"));
        }
    }
} elseif($query[0] == "edit"){
    if(isset($query[1]) && is_numeric($query[1])){
        if(isset($query[2]) && $query[2] == "delete"){
            if(removeCitizen($query[1])){
                array_push($msgs, array("message" => "deleted"));
            } else {
                array_push($msgs, array("message" => "notdeleted"));

            }
        } elseif($query[2] == "edit") {
            if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['sexe']) && !empty($_POST['ethnie']) && !empty($_POST['cheveux']) && !empty($_POST['profession'])){
                if(idExists($query[1])){
                    $data = array(
                        ":prenom" => $_POST['prenom'],
                        ":nom" => $_POST['nom'],
                        ":age" => $_POST['age'],
                        ":sexe" => $_POST['sexe'],
                        ":ethnie" => $_POST['ethnie'],
                        ":cheveux" => $_POST['cheveux'],
                        ":profession" => $_POST['profession'],
                        ":id" => $query[1]
                    );
                    if(editCitizen($data)){
                        array_push($msgs, array("message" => "updated"));
                    } else {
                        array_push($msgs, array("message" => "notupdated"));
                    }
                    if(isset($_FILES['photo'])){
                        $file = $_FILES['photo'];
                        $uploads_dir = ROOT . '/uploads';
                        if($file['type'] == ("image/jpeg" || "image/png")){
                            $tmp_name = $file['tmp_name'];
                            $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
                            $id = $query[1];
                            $name = "$id.$ext";
                            move_uploaded_file($tmp_name, "$uploads_dir/$name");
                        }
                    }
                }
            }
            $citizen = getCitizen($query[1])->fetchAll(PDO::FETCH_ASSOC)[0];
        }
    }
}

