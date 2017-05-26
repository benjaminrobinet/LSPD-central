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
                <h1><small><?=$session->grade?> <?=$session->nom?></small></h1>
                
<!--                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
            </div>
        </div>
    </div>
</div>
<?php } ?>