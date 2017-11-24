<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

if(isset($_SESSION['id']))
{
    $user = $db -> query('SELECT pseudo, email FROM user WHERE id_util ='.$_SESSION['id']);
    $user -> execute();
    $result = $user -> fetch();

}else{
    $result['pseudo'] = "";
    $result['email'] = "";
}


?>

    <main class="container">

        <div class="col-md-6">
            <p>Nous sommes idéalement situés à côté de la gare au 4 rue Paul Doumer, 89000 - Auxerre</p>
            <p>Si vous n'aimez pas notre formulaire de contact ou si vous avez beosin d'envoyer des pièces jointes n'hésitez pas à nous contacter via <a href="mailto: contact@balancetoncode.com" name="mail : contact@balancetoncode.com">ce lien</a></p>
        </div>
        <form method="POST" class="col-md-6" action="reponse_contact.php">

            <fieldset>

                <legend>Balance ton message</legend>

                <fieldset>

                    <label for="pseudo">Pseudo</label>
                    <p><input type="text" name="pseudo" id="pseudo" value='<?= $result['pseudo']; ?>'></p>
                    <label for="email">Email</label>
                    <p><input type="text" name="email" id="email" value='<?= $result['email']; ?>'></p>
                    <label for="titre">Titre du Message</label>
                    <p><input type="text" name="titre" id="titre"></p>
                    <label for="message">Message</label>
                    <p><textarea name="message" rows= "5" id="message" placeholder="Je veux faire un don"></textarea></p>

                    <button type="submit" id="valid" class="btnTheme">Envoyer<span class="btnUnder"></span></button>

                </fieldset>

        </form>

    </main>

<?php

include_once('../content/footer.php');

?>