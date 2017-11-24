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

     <form method="POST" action="reponse_contact.php">

        <fieldset>

            <legend>Balance ton Message</legend>

            <fieldset>

                <label for="pseudo">Pseudo</label>
                <p><input type="text" name="pseudo" id="pseudo" value='<?= $result['pseudo']; ?>'></p>
                <label for="email">Email</label>
                <p><input type="text" name="email" id="email" value='<?= $result['email']; ?>'></p>
                <label for="titre">Titre du Message</label>
                <p><input type="text" name="titre" id="titre"></p>
                <label for="message">Message</label>
                <p><textarea name="message" rows= "5" id="message" placeholder="Je veux faire un don"></textarea>


                <input type="submit" name="valid"><a href="accueil.php">Retour page d'accueil</a>

               
            </fieldset>
                         
    </form>

</main>

<?php

include_once('../content/footer.php');

?>