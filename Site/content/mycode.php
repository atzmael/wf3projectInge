<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_SESSION['id'])){

    $user = $db -> query('SELECT article.title, article.description, article.release_date FROM article WHERE article._id_util ='.$_SESSION['id']);

    $result = $user -> fetchAll();

}

include_once('../content/header.php');

?>

<main class="container">
    <div>
    <?php

    foreach($result as $value){
        echo '<p>'.$value['title'].'</p>';
    }

    ?>
    </div>
</main>


<?php

include_once('../content/footer.php')

?>
