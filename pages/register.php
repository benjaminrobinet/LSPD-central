<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-header">
                <h1><?=txt("Gestion du registre")?></h1>
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