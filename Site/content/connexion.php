<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

<meta charset="utf-8">
<main class="container">

     <section class="row">
	     <div class="col-12 carou">
		

               	<!-- carousel slogan -->
		<div class="col-12">
			
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

	<section class="row section1"> 

		<div class="col-12 formulaire">


             <form method="POST" action="reponse_connexion.php">

		
		      <fieldset>
			
			      <legend>>connexion_</legend>

			<p><label class="label1" for="email">Entrez votre email:</label></p>
				<input type="text" name="email" id="email">
			

			<p><label class="label2" for="mot_de_passe">Mot de passe:</label></p>
				<input type="password" name="mot_de_passe" id="mot_de_passe">
			

			<p><a href="oubli_mdp.php">Mot de passe oublié ?</a></p>

			<input class="bouton" type="submit" name="connexion">

		</fieldset>

	         </form>

	    </div>
	    
	 </section>        



</main>

<?php

include_once('../content/footer.php')

?>
