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
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Agent supprimé")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notdeleted"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Agent non supprimé")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "updated"){
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Agent mit à jour")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notdeleted"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Agent non mit à jour")?>.
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
                <li role="presentation" class="<?= ($query[0] == "") ? "active" : "" ?>"><a href="<?=$current?>"><?=txt("Liste")?></a></li>
                <li role="presentation" class="<?= ($query[0] == "add") ? "active" : "" ?>"><a href="<?=$current.'/add'?>"><?=txt("Ajouter")?></a></li>
                <li role="presentation" class="<?= ($query[0] == "edit") ? "active" : "" ?>"><a href="<?=$current.'/edit'?>"><?=txt("Editer")?></a></li>
            </ul>
        </div>
    </div>
    <?php if($query[0] == "add"){ ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1><?=txt("Ajouter un civil")?></h1>
                </div>
                <form action="" method="post">
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
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
<?php } elseif($query[0] == "edit"){ } ?>