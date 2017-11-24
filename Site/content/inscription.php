<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

<main class="container inscription">
    <!-- Titre inscription -->
  
  <section class="row titre">
          <div class="col-12">

              <h1> {inscription} </h1>


          </div>
    </section>

<!-- conteneur  formulaire -->
    <section class="row section2">

        

    <form method="POST" action="reponse_inscription.php" class="mx-auto">

    
             <fieldset class="form1">

                <legend>Coordonnées</legend>
                <label for="nom">Votre Nom</label>
                <p><input type="text" name="nom" id="nom"></p>

                <label for="prenom">Votre Prenom</label>
                <p><input type="text" name="prenom" id="prenom"></p>

                <label for="function">Profession</label>
                <p><input type="text" name="function" id="function"></p>

                <label for="ville">Votre ville</label>
                <p><input type="text" name="ville" id="ville"></p>

                <label for="pays">Votre Pays</label>
                <p><input type="text" name="pays" id="pays"></p>

            </fieldset>

      
      

            <fieldset class="form2">

                <legend>Identifiant de connexion</legend>

                <label for="pseudo">Votre pseudo</label>
                <p><input type="text" name="pseudo" id="pseudo"></p>

                <label for="email">Votre email</label>
                <p><input type="text" name="email" id="email"></p>

                <label for="mdp1">Votre mot de passe </label>
                <p><input type="password" name="mdp1" id="mdp1"></p>

                <label for="mdp2">Confirmer votre mot de passe</label>
                <p><input type="password" name="mdp2" id="mdp2"></p>

            </fieldset>
   
<!-- bouton valider -->

        <input class="bouton" type="submit" name="valid">

<!--Lien retour page d'accueil -->

        <p><a href="accueil.php">Retour page d'accueil</a></p>

    </form>

  </section>  

</main>

<?php

include_once "./footer.php";

?>
