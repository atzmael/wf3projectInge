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

        

    <form name="form1" method="POST" action="reponse_inscription.php" class="mx-auto" " >

    <!-- formulaire informations personnelles --> 

             <fieldset class="form1">

                <legend>Coordonnées</legend>
                <label for="nom">Votre Nom</label>
                <p><input type="text" name="nom" id="nom"></p>
                <p id="erreurNom"></p>

                <label for="prenom">Votre Prenom</label>
                <p><input type="text" name="prenom" id="prenom" ></p>
                <p id="erreurPrenom"></p>

                <label for="Profession">Profession</label>
                <p><input type="text" name="Profession" id="profession"></p>
                <p id="erreurProfession"></p>


                <label for="ville">Votre ville</label>
                <p><input type="text" name="ville" id="ville"></p>
                <p id="erreurVille"></p>

                <label for="pays">Votre Pays</label>
                <p><input type="text" name="pays" id="pays"></p>
                <p id="erreurPays"></p>

            </fieldset>


 <!-- formulaire info connexion -->
      

            <fieldset class="form2">

                <legend>Identifiant de connexion</legend>

                   <p><label for="pseudo">Votre pseudo</label></p>
                    <p><input type="text" name="pseudo" id="pseudo"></p>
                    <p id="erreurPseudo"></p>

            
                     
                     <p> 
                          <label for="mail"><span> Votre adresse e-mail :</span></label>
                    <p class="email">
                            <span id="email-error" class="erreur">Le mail est incorrect</span>
                            <input name="email" onblur="check_mail()" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />                         
                        </p>


               <p> <label for="mdp1">Votre mot de passe </label></p>
                <p><input type="password" name="mdp1" id="mdp1"></p>

                <p><label for="mdp2">Confirmer votre mot de passe</label></p>
                <p><input type="password" name="mdp2" id="mdp2"></p>
                <p id="erreurPass"></p>

            </fieldset>
   
<!-- bouton valider -->


           <button type="submit" id="bouton">Valider</button>
       
    </form>

  </section>  

</main>

<?php

include_once "./footer.php";

?>
