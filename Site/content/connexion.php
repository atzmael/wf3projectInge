<?php

session_start();

include_once('../config/librairie.php');


include_once('../content/header.php');

?>

<main>
    <form method="POST" action="reponse_connexion.php">

        <fieldset>

            <legend>Connexion</legend>

            <p>
                <label for="email">Entrez votre email</label>
                <input type="text" name="email" id="email">
            </p>

            <p>
                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe">
            </p>

            <p><a href="oubli_mdp.php">Mot de passe oublié ?</a></p>

            <input type="submit" name="valid">

        </fieldset>

    </form>
</main>

<?php include_once('../content/footer.php') ?>

