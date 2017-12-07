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


    <form name="form1" method="POST" action="reponse_inscription.php" class="mx-auto col-12"  > <!--la classe mx-auto col-12 pour centrer le bouton -->

    <!-- formulaire informations personnelles --> 

          <fieldset class="form1 mx-auto">

              <legend>Coordonnées</legend>

                <label for="nom">Votre Nom :</label>
                <p><input type="text" name="nom" id="nom"></p>
                <p id="erreurNom"></p>

                <label for="prenom">Votre Prenom :</label>
                <p><input type="text" name="prenom" id="prenom" ></p>
                <p id="erreurPrenom"></p>

                <label for="Profession">Profession :</label>
                <p><input type="text" name="Profession" id="profession"></p>
                <p id="erreurProfession"></p>


                <label for="ville">Votre ville :</label>
                <p><input type="text" name="ville" id="ville"></p>
                <p id="erreurVille"></p>

                <label for="pays">Votre Pays :</label>
                <p><input type="text" name="pays" id="pays"></p>
                <p id="erreurPays"></p>

          </fieldset>


 <!-- formulaire info connexion -->
      

            <fieldset class="form2 mx-auto">

              <legend>Identifiant de connexion</legend>

                   <p><label for="pseudo">Votre pseudo :</label></p>
                    <p><input type="text" name="pseudo" id="pseudo"></p>
                    <p id="erreurPseudo"></p>

            
                     
                     <p><label for="mail">Votre adresse e-mail : </label></p>
                    <p class="email"><input name="email"  type="email"  id="email" /></p>
                    <p id="erreurEmail"></p>


               <p> <label for="pass1">Votre mot de passe : </label></p>
                <p><input type="password" name="pass1" id="pass1"></p>

                <p><label for="pass2">Confirmer votre mot de passe :</label></p>
                <p><input type="password" name="pass2" id="pass2" required="required"></p> 
                <p id="erreurPass"></p>

            </fieldset>
   
<!-- bouton valider -->

           <div  class="row">

                <div class="col-12 text-center"> <!-- pour centrer le bouton valider --> 
                    <button type="submit" id="bouton">Valider</button>

                </div>
           </div>


    </form>
     
    
  </section>  

</main>

<?php

include_once "./footer.php";

?>
