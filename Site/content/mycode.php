<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_SESSION['id'])){

    $user = $db -> query('SELECT * FROM article WHERE article._id_util ='.$_SESSION['id']);

    $result = $user -> fetchAll();

}

include_once('../content/header.php');

?>

<main class="container">
    <span class="asideBtn"><i class="fa fa-plus" aria-hidden="true"></i></span>
    <aside class="menuUser">
        <ul>
            <li><a href="<?php echo directory() ?>content/user.php">Mon profil</a></li>
            <li><a href="<?php echo directory() ?>content/mycode.php">Mon Code</a></li>
            <li><a href="<?php echo directory() ?>content/modif_profil.php">Modifier mon profil</a></li>
            <li><a href="<?php echo directory() ?>content/modif_email.php">Changer mon email</a></li>
        </ul>
    </aside>
    <div class="userContent">
        <?php

        foreach($result as $value){
            echo  '<p><a href="'.directory().'content/article.php?id='.$value['id_article'].'">'. $value['title'] .'</a></p>';

        }

        ?>
    </div>
</main>


<?php

include_once('../content/footer.php')

?>
