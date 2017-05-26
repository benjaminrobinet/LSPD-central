<div class="container">
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
                <li role="presentation" class="<?= ($query == "add") ? "active" : "" ?>"><a href="<?=$current.'/add'?>"><?=txt("Ajouter")?></a></li>
                <li role="presentation" class="<?= ($query == "delete") ? "active" : "" ?>"><a href="<?=$current.'/delete'?>"><?=txt("Supprimer")?></a></li>
                <li role="presentation" class="<?= ($query == "edit") ? "active" : "" ?>"><a href="<?=$current.'/edit'?>"><?=txt("Editer")?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php
    if($query == "add"){
    ?>
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
                            <label for="identifiant"><?=txt("Email")?></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?=txt("Email")?> (<?=txt("exemple")?>: jean.marie@contact.fr)">
                        </div>
                        <div class="form-group">
                            <label for="password"><?=txt("Mot de passe")?></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="<?=txt("Mot de passe")?>">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="firstname"><?=txt("Prénom")?></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?=txt("Prénom")?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="lastname"><?=txt("Nom")?></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?=txt("Nom")?>">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-default">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }