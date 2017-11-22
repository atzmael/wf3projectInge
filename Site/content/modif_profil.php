<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_SESSION['id'])){

    $user = $db -> query('SELECT pseudo, firstname, lastname, city, country FROM user WHERE id_util ='.$_SESSION['id']);

    $user -> execute();

    $result = $user -> fetch();

}else {
    header("Location: ".directory()."content/connexion.php");
}

include_once('../content/header.php');

?>

<main class="container">
    <form method="POST" action="reponse_modif_profil.php" autocomplete= "on">

        <fieldset>

            <legend>Vos informations personnelles</legend>

            <fieldset>

                <legend>Coordonnées</legend>
                <label for="nom">modifiez votre nom</label>
                <p><input type="text" name="pseudo" id="nom" value="<?php  echo $result['pseudo'] ?>"></p>

                <label for="prenom">modifiez votre Prenom</label>
                <p><input type="text" name="firstname" id="prenom" value="<?php  echo $result['firstname'] ?>"></p>

                <label for="function">Profession</label>
                <p><input type="text" name="lastname" id="function" value="<?php  echo $result['lastname'] ?>"></p>

                <label for="ville">Votre ville</label>
                <p><input type="text" name="city" id="ville" value="<?php  echo $result['city'] ?>"></p>

                <label for="pays">Votre Pays</label>
                <p><input type="text" name="country" id="pays" value="<?php  echo $result['country'] ?>"></p>

            </fieldset>

        <input type="submit" name="valid"><a href="accueil.php">Retour page d'accueil</a>
    </form>
</main>

<?php

include_once('../content/footer.php')

?>