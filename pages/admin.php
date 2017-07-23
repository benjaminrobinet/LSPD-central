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
                } elseif($msg['message'] == "exists"){
                    ?>
                    <div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Attention")?>!</strong> <?=txt("Cet identifiant existe déjà")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "added"){
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("Fait")?>!</strong> <?=txt("Cet agent a bien été ajouté")?>.
                    </div>
                    <?php
                } elseif($msg['message'] == "notadded"){
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button><strong><?=txt("ERREUR")?>!</strong> <?=txt("Impossible d'ajouter l'agent")?>. <?=txt("Contactez un administrateur")?>.
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
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1>Gestion des agents</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified">
                <li role="presentation" class="<?= ($query[0] == "add") ? "active" : "" ?>"><a href="<?=$current.'/add'?>"><?=txt("Ajouter")?></a></li>
                <li role="presentation" class="<?= ($query[0] == "edit") ? "active" : "" ?>"><a href="<?=$current.'/edit'?>"><?=txt("Editer")?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php if($query[0] == "add"){ ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1>Ajouter un agent</h1>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="identifiant"><?=txt("Identifiant")?></label>
                            <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="<?=txt("Identifiant")?> (<?=txt("exemple")?>: jean.marie)">
                        </div>
                        <div class="form-group">
                            <label for="email"><?=txt("Email")?></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?=txt("Email")?> (<?=txt("exemple")?>: jean.marie@contact.fr)">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="prenom"><?=txt("Prénom")?></label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="<?=txt("Prénom")?> (<?=txt("exemple")?>: Jean)">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="nom"><?=txt("Nom")?></label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="<?=txt("Nom")?> (<?=txt("exemple")?>: Marie)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="grade"><?=txt("Grade")?></label>
                                    <input type="text" class="form-control" id="grade" name="grade" placeholder="<?=txt("Grade")?> (<?=txt("exemple")?>: lieutenant">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="accreditation"><?=txt("Accreditation")?></label>
                                    <select name="accreditation" id="accreditation" class="form-control">
                                        <option value="user">Utilisateur</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
<?php } elseif($query[0] == "edit"){
    if(!isset($query[1])){
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>Supprimer un agent</h1>
                </div>
                <?php
                foreach($agents as $agent){
                ?>
                <ul class="list-group">
                    <li class="list-group-item clearfix">
                        <strong><?=ucfirst($agent['grade'])?></strong>  <?=ucfirst($agent['nom'])?>  <?=ucfirst(substr($agent['prenom'],0, 1))?>. <small><?=$agent['identifiant']?></small>
                        <span class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=txt("Editer")?> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><?=txt("Annuler")?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="edit/<?=$agent['id']?>/edit"><?=txt("Editer")?></a></li>
                                    <li><a href="edit/<?=$agent['id']?>/delete"><?=txt("Supprimer")?></a></li>
                                </ul>
                            </div>
                        </span>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php } elseif(isset($query[1]) && isset($query[2]) && is_numeric($query[1]) && $query[2] == "edit") { ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>Ajouter un agent</h1>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="identifiant"><?=txt("Identifiant")?></label>
                        <input type="text" value="<?=$agent['identifiant']?>" class="form-control" id="identifiant" name="identifiant" placeholder="<?=txt("Identifiant")?> (<?=txt("exemple")?>: jean.marie)">
                    </div>
                    <div class="form-group">
                        <label for="email"><?=txt("Email")?></label>
                        <input type="email" value="<?=$agent['email']?>" class="form-control" id="email" name="email" placeholder="<?=txt("Email")?> (<?=txt("exemple")?>: jean.marie@contact.fr)">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="prenom"><?=txt("Prénom")?></label>
                                <input type="text" value="<?=$agent['prenom']?>" class="form-control" id="prenom" name="prenom" placeholder="<?=txt("Prénom")?> (<?=txt("exemple")?>: Jean)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nom"><?=txt("Nom")?></label>
                                <input type="text" value="<?=$agent['nom']?>" class="form-control" id="nom" name="nom" placeholder="<?=txt("Nom")?> (<?=txt("exemple")?>: Marie)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="grade"><?=txt("Grade")?></label>
                                <input type="text" value="<?=$agent['grade']?>" class="form-control" id="grade" name="grade" placeholder="<?=txt("Grade")?> (<?=txt("exemple")?>: lieutenant">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="accreditation"><?=txt("Accreditation")?></label>
                                <select name="accreditation" id="accreditation" class="form-control">
                                    <option value="user" <?=($agent['accreditation'] == 'user') ? 'selected="selected"' : ''?>>Utilisateur</option>
                                    <option value="admin" <?=($agent['accreditation'] == 'admin') ? 'selected="selected"' : ''?>>Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="well-sm well">
                        <div class="checkbox">
                            <label for="active">
                                <input type="checkbox" value="1" <?=($agent['active'] == 1) ? 'checked="checked"' : ''?> id="active" name="active"> <?=txt("Actif")?>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
<?php
    }
}