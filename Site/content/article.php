<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_GET['id'])){

    $query = $db -> prepare("SELECT article.title, article.description, article.content, article.release_date, article.vote, user.pseudo FROM article JOIN user ON article._id_util = user.id_util WHERE id_article = ?");
    $query -> bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $query -> execute();

    $result = $query -> fetch();

}
else

{
    header("Location: 404.php");
}

include_once('../content/header.php');

?>

    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php

                echo '<h2>'.$result['title'].'</h2>';

                ?>
            </div>
        </div>

    </main>

<?php

include_once('../content/footer.php')

?>