<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php
            foreach($msgs as $msg){
                if($msg['message'] == "form"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Attention")?>!</strong> <?=txt("Vérifiez le formulaire")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "added"){
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Ce civil a bien été ajouté")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notadded"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Impossible d'ajouter le civil")?>. <?=txt("Contactez un administrateur")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "deleted"){
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Civil supprimé")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notdeleted"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Civil non supprimé")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "updated"){
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Civil mit à jour")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notdeleted"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Civil non mit à jour")?>.
                    </div>
                    <?php
                }

            }
            ?>
        </div>
        <div class="col-xs-12">
            <div class="page-header">
                <h1><?=txt("Gestion du registre")?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified">
                <li role="presentation" class="<?= ($query[0] == "list" ||$query[0] == "") ? "active" : "" ?>"><a href="<?=$current?>/list"><?=txt("Liste")?></a></li>
                <li role="presentation" class="<?= ($query[0] == "add") ? "active" : "" ?>"><a href="<?=$current?>/add"><?=txt("Ajouter")?></a></li>
                <li role="presentation" class="<?= ($query[0] == "edit") ? "active" : "" ?>"><a href="<?=$current?>/edit"><?=txt("Editer")?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php if($query[0] == "" || $query[0] == "list"){?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1><?=txt("Liste des civils")?></h1>
            </div>
        </div>
        <div class="col-xs-12">
            <form class="form-inline pull-right bottom15">
                <div class="form-group">
                    <label class="sr-only" for="nbperpage"><?=txt("Nombre par page")?></label>
                    <div class="input-group">
                        <div class="input-group-addon"><?=txt("Lignes")?></div>
                        <select class="form-control" name="nbperpage" id="nbperpage">
                            <option value="25" <?= ($nbPerPage == "25") ? "selected=\"selected\"" : "" ?>>25</option>
                            <option value="50" <?= ($nbPerPage == "50") ? "selected=\"selected\"" : "" ?>>50</option>
                            <option value="100" <?= ($nbPerPage == "100") ? "selected=\"selected\"" : "" ?>>100</option>
                            <option value="all" <?= ($nbPerPage == "all") ? "selected=\"selected\"" : "" ?>><?=txt("Tout")?></option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><?=txt("Valider")?></button>
            </form>
        </div>
        <div class="col-xs-12">
            <?php
            foreach($citizens as $citizen){
            ?>
            <ul class="list-group">
                <li class="list-group-item clearfix">
                    <?=ucfirst($citizen['prenom'])?>  <?=ucfirst($citizen['nom'])?> <small>(<?=substr(ucfirst($citizen['sexe']),0,1)?>)</small>
                    <span class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?=txt("Editer")?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#"><?=txt("Annuler")?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?=$current?>/edit/<?=$citizen['id']?>/edit"><?=txt("Editer")?></a></li>
                                <li><a href="<?=$current?>/edit/<?=$citizen['id']?>/delete"><?=txt("Supprimer")?></a></li>
                            </ul>
                        </div>
                    </span>
                </li>
            </ul>
            <?php
            }
            ?>
        </div>
        <div class="col-xs-12">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="<?= ($nbPage == 1 || $currentPage == 1) ? "disabled" : "" ?>">
                        <a href="<?=($nbPage != 1 && $currentPage > 1) ? $current."/list/" . ($currentPage-1) . "?nbperpage=" . $nbPerPage : "#"?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for($i = 1; $i <= $nbPage; $i++){ ?>
                    <li class="<?=($i == $currentPage) ? "active" : ""?>">
                        <a href="<?=$current."/list/" . $i . "?nbperpage=" . $nbPerPage ?>"><?=$i?> </a>
                    </li>
                    <?php } ?>
                    <li class="<?= ($nbPage == 1 || $currentPage == $nbPage) ? "disabled" : "" ?>">
                        <a href="<?=($nbPage != 1 && $currentPage < $nbPage) ? $current."/list/" . ($currentPage+1) . "?nbperpage=" . $nbPerPage : "#"?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php } elseif($query[0] == "add"){ ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1><?=txt("Ajouter un civil")?></h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="prenom"><?=txt("Prénom")?></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="<?=txt("Prénom")?> (<?=txt("exemple")?>: Jean)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="nom"><?=txt("Nom")?></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="<?=txt("Nom")?> (<?=txt("exemple")?>: Marie)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="age"><?=txt("Age")?></label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="<?=txt("Age")?> (<?=txt("exemple")?>: 37)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label for="sexe"><?=txt("Sexe")?></label>
                            <select name="sexe" id="sexe" class="form-control">
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label for="ethnie"><?=txt("Ethnie")?></label>
                            <input type="text" class="form-control" id="ethnie" name="ethnie" placeholder="<?=txt("Ethnie")?> (<?=txt("exemple")?>: Européen)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label for="cheveux"><?=txt("Cheveux")?></label>
                            <input type="text" class="form-control" id="cheveux" name="cheveux" placeholder="<?=txt("Cheveux")?> (<?=txt("exemple")?>: Blond)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label for="profession"><?=txt("Profession")?></label>
                            <input type="text" class="form-control" id="profession" name="profession" placeholder="<?=txt("Profession")?> (<?=txt("exemple")?>: Secouriste)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <label for="photo"><?=txt("Photo")?></label>
                            <input type="file" id="photo" name="photo">
                            <p class="help-block">Image PNG ou JPEG</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<?php } elseif($query[0] == "edit"){ ?>
    <?php if(!isset($query[1])){ ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="top15 alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button><strong><?=txt("Attention")?>!</strong> <?=txt("Selectionnez un civil à modifier dans la liste")?> <a href="<?=WEBROOT?>/register/list"><?=txt("Liste des civils")?></a>.
                    </div>
                </div>
            </div>
        </div>
    <?php } else {?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1><?=txt("Ajouter un civil")?></h1>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="prenom"><?=txt("Prénom")?></label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?=$citizen['prenom']?>" placeholder="<?=txt("Prénom")?> (<?=txt("exemple")?>: Jean)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="nom"><?=txt("Nom")?></label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?=$citizen['nom']?>" placeholder="<?=txt("Nom")?> (<?=txt("exemple")?>: Marie)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="age"><?=txt("Age")?></label>
                                <input type="number" class="form-control" id="age" name="age" value="<?=$citizen['age']?>" placeholder="<?=txt("Age")?> (<?=txt("exemple")?>: 37)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="sexe"><?=txt("Sexe")?></label>
                                <select name="sexe" id="sexe" class="form-control">
                                    <option value="homme" <?=($citizen['sexe'] == 'homme') ? 'selected="selected"' : ''?>>Homme</option>
                                    <option value="femme" <?=($citizen['sexe'] == 'femme') ? 'selected="selected"' : ''?>>Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="ethnie"><?=txt("Ethnie")?></label>
                                <input type="text" class="form-control" id="ethnie" name="ethnie" value="<?=$citizen['ethnie']?>" placeholder="<?=txt("Ethnie")?> (<?=txt("exemple")?>: Européen)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="cheveux"><?=txt("Cheveux")?></label>
                                <input type="text" class="form-control" id="cheveux" name="cheveux" value="<?=$citizen['cheveux']?>" placeholder="<?=txt("Cheveux")?> (<?=txt("exemple")?>: Blond)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="profession"><?=txt("Profession")?></label>
                                <input type="text" class="form-control" id="profession" name="profession" value="<?=$citizen['profession']?>" placeholder="<?=txt("Profession")?> (<?=txt("exemple")?>: Secouriste)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="photo"><?=txt("Photo")?></label>
                                <input type="file" id="photo" name="photo">
                                <p class="help-block">Image PNG ou JPEG (ne pas modifier pour garder l'actuel)</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } ?>
