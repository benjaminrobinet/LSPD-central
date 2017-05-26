<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php
                foreach($errors as $error){
                ?>
                   <div class="alert alert-danger alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?=txt($error)?>
                    </div>
                <?php echo $session->prenom;
                }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="identifiant"><?=txt("Identifiant")?></label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="<?=txt("John")?>">
                </div>
                <div class="form-group">
                    <label for="password"><?=txt("Mot de passe")?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
            </form>
        </div>
    </div>
</div>