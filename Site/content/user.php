<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_SESSION['id'])){

    $user = $db -> query('SELECT pseudo, firstname, lastname, email, city, country, registration, function, nb_article, nb_comment FROM user WHERE id_util ='.$_SESSION['id']);

    $user -> execute();

    $result = $user -> fetch();

}else {
    header("Location: ".directory()."content/connexion.php");
}

include_once('../content/header.php');

?>

<main class="container">
    <div>
        <p>Bienvenu <?php echo $result['pseudo']; ?> !</p>
    </div>
</main>

<?php

include_once('../content/footer.php')

?>