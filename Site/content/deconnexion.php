<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

if(isset($_SESSION['id']))
{
    session_unset();
    echo "<p> Vous êtes maintenant déconnecté</p>";
}
else
{
    echo "<p> Vous cherchez à vous déconnecter sans vous connecter, c'est étonnant !</p>";
}

session_destroy();

?>

    <main class="container">
        <p><a href="<?php echo directory() ?>index.php">Retour à l'accueil</a></p>
    </main>

<?php

include_once('../content/footer.php')

?>