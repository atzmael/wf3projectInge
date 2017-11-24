<?php

if(isset($_SESSION['id'])){
    $user = $db -> query('SELECT pseudo, firstname, lastname, email, city, country, registration, function, rank, nb_article, nb_comment FROM user WHERE id_util ='.$_SESSION['id']);

    $result_user = $user -> fetch();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Balance ton code</title>

    


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo directory() ?>assets/css/stylesheets/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="CSS/style_connexion.css">
    <link rel="stylesheet" type="text/css" href="CSS/style_inscription.css">
    

    <script type="text/javascript" src="<?php echo directory() ?>assets/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo directory() ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo directory() ?>assets/js/function.js"></script>

</head>
<body>
<div id="loader" aria-hidden="true">
    <img src="<?php echo directory(); ?>assets/img/loader.gif" alt="Image de chargement de la page" aria-hidden="true">
</div>

<div class="page pb-md-2">
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
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_js.php">JAVASCRIPT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_php.php">PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/index_mysql.php">SQL</a>
                </li>
                <?php
                if(isset($_SESSION['id'])){
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"> Profil</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?php echo directory() ?>content/user.php">Mon profil</a>
                            <a class="dropdown-item" href="<?php echo directory() ?>content/mycode.php">Mes codes</a>
                            <?php
                                if($result_user['rank'] == 1)
                                {
                                   
                                    ?>
                                    <a class="dropdown-item" href="<?php echo directory() ?>content/admin.php">Administration</a>
                                    <?php
                                }
                            ?>
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo directory() ?>content/deconnexion.php">Deconnexion</a>

                        </div>
                    </li>
                <?php
                }else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link nl smoothScroll" href="<?php echo directory() ?>content/connexion.php">CONNEXION</a>
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
    </nav>