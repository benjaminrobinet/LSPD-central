<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?=WEBROOT?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=WEBROOT?>/assets/css/sb-admin-2.min.css" />
    <link rel="stylesheet" href="<?=WEBROOT?>/assets/css/default.css" />
    <script src="<?=WEBROOT?>/assets/js/jquery.js"></script>
    <title><?=$settings['title']?></title>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">LSPD Central</a>
             </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle <?=($settings!="home") ? "active" : ""?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Page <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=WEBROOT?>/records">Amender</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=WEBROOT?>/register">Registre</a></li>
                            <li><a href="<?=WEBROOT?>/groupes">Groupes (gang)</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=WEBROOT?>/agents">Agents</a></li>
                        </ul>
                    </li>
                </ul>
    <!--
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><?=txt("Home")?></a></li>
                    <li><a href="#"><?=txt("string")?></a></li>
                </ul>
    -->
                <form class="navbar-form navbar-left" action="<?=WEBROOT?>/search" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Rechercher">
                    </div>
                    <button type="submit" class="btn btn-default"><?=txt("Chercher")?></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?=txt("Aide")?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=txt("Menu")?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if($session->accreditation == 'admin'){ ?>
                                <li><a href="<?=WEBROOT?>/admin"><?=txt("Admin")?></a></li>
                            <?php } ?>
                            <li><a href="<?=WEBROOT?>/logout"><?=txt("Déconnexion")?></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    