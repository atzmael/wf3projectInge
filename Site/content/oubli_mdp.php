<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

<main class="container reini-mdp">
    <form method="POST" action="reponse_oubli_mdp.php">

        <fieldset>

            <legend>Email à reinitialiser</legend>

            <input type="text" name="email" placeholder="votre email" id="email">

            <button>Réinitialiser</button>

        </fieldset>

    </form>
</main>

<?php

include_once('../content/footer.php');

?>
