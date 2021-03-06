<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_SESSION['id'])){

    $user = $db -> query('SELECT * FROM user WHERE id_util ='.$_SESSION['id']);

    $user -> execute();

    $result = $user -> fetch();

}else {
    header("Location: ".directory()."content/connexion.php");
}

include_once('../content/header.php');

?>

<main class="container user">
    <div class="userContent">
        <p>Bienvenue <?php echo $result['pseudo'].' ('.$result['firstname'].' '.$result['lastname'].')'; ?></p>
        <p>Date d'inscription : <?php echo $result['registration']; ?></p>
        <p>Mail : <?php echo $result['email']; ?></p>
        <p>Pays : <?php echo $result['country']; ?></p>
        <p>Ville : <?php echo $result['city']; ?></p>
    </div>
</main>

<?php

include_once('../content/footer.php');

?>