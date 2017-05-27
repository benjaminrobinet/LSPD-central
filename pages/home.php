<?php if(!$session->id){ ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-danger" role="alert">
              <strong><?=txt('Attention')?>!</strong> <?=txt('Vous n\'êtes pas connecté')?>. <a class="alert-link" href="./login"><?=txt('Cliquez ici pour vous connecter')?></a>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1><small><?=$session->grade?> <?=$session->nom?></h1>
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="<?=WEBROOT?>/assets/img/logo.png" alt="Logo LSPD">
                        </div>
                        <div class="col-xs-8">
                            <p><?=txt("Bienvenu sur LSPD Central")?></p>
                            <p><small><?=txt("Que souhaitez-vous faire ?")?></small></p>
                            <p><a class="btn btn-primary btn-sm" href="#" role="button"><?=txt("Amender")?></a></p>
                            <p><a class="btn btn-primary btn-sm" href="#" role="button"><?=txt("Registre")?></a></p>
                            <p><a class="btn btn-primary btn-sm" href="#" role="button"><?=txt("Groupes")?></a></p>
                            <p><a class="btn btn-primary btn-sm" href="#" role="button"><?=txt("Agents")?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>