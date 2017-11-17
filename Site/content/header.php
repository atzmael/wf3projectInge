<?php


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Balance ton code</title>

    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/stylesheets/responsive.css">

    <script type="text/javascript" src="<?php echo directory() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo directory() ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo directory() ?>assets/js/function.js"></script>

</head>
<body>
<div id="loader" aria-hidden="true">
    <img src="<?php echo directory(); ?>assets/img/loader.gif" alt="Image de chargement de la page" aria-hidden="true">
</div>

<div class="page">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark text-center">
        <a href="<?php echo directory() ?>" class="align-self-center linkLogo smoothScroll"><img src="<?php echo directory() ?>assets/img/logo.png" alt="Logo"></a>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>index.php">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_html.php">HTML</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_css.php">CSS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_javascript.php">JAVASCRIPT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_php.php">PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_sql.php">SQL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/connexion.php">CONNEXION</a>
                </li>
            </ul>
        </div>
    </nav>