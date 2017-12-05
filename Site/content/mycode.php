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

<main class="container mycode">
    <div class="row">
        <h1 class="col-12 text-center">Mes codes</h1>
        <?php

        foreach($result as $value){
            echo  '<a href="'.directory().'content/article.php?id='.$value['id_article'].'"><p class="code">'. $value['title'] .' - <i>publié le '.$value['release_date'].'</i></p></a>';

        }

        ?>
    </div>
</main>


<?php

include_once('../content/footer.php')

?>
