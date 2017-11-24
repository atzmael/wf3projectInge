<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

<main class="container connexion">

    <section class="row">
        <div class="col-12 carou">


            <!-- carousel slogan -->
            <div>
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="..." alt=" Balance ton code">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="..." alt="Partage tes connaissances">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="..." alt="Rejoint la communauté">
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>

		
<!-- formulaire de connexion -->

             
    <section class="row section1">

        <div class="col-12 formulaire">
			<form method="POST" action="reponse_connexion.php " class="mx-auto">
        	 <fieldset>

                    <legend>>connexion_</legend>

                    <p><label class="label1" for="email">Entrez votre email:</label></p>
                    <input type="text" name="email" id="email">


                    <p><label class="label2" for="mot_de_passe">Mot de passe:</label></p>
                    <input type="password" name="mot_de_passe" id="mot_de_passe">
			</fieldset>


<!-- Liens mot de passe oublié et inscription -->

        <div class="col-12 Liens">
			<a href="oubli_mdp.php">Mot de passe oublié ?</a>

		    <a href="inscription.php">Pas encore membre ?</a>
			
		</div>	
<!-- bouton validation formulaire -->

			  <button class="bouton">Connexion</button>

		
	         </form>
	     
        </div>

    </section>



</main>

<?php

include_once('../content/footer.php')

?>
