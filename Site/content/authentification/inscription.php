<?php

	//inscription.php

?>


<!DOCTYPE html>
<html>
<head>
	<title>INSCRIPTION</title>
</head>
<body>

	<form method="POST" action="reponse_inscription.php">
		
		<fieldset>

			<legend>Infos de connexions</legend>

			<fieldset>

				<legend>Coordonnées</legend>
				<label for="nom">Votre Nom</label>
				<p><input type="text" name="nom" id="nom"></p>

				<label for="prenom">Votre Prenom</label>
				<p><input type="text" name="prenom" id="prenom"></p>

				<label for="date_naissance">Votre date de naissance</label>
				<p><input type="text" name="date_naissance" id="date_naissance"></p>

				<label for="code_postal">Code postal</label>
				<p><input type="text" name="code_postal" id="code_postal"></p>

				<label for="ville">Votre ville</label>
				<p><input type="text" name="ville" id="ville"></p>

				<label for="pays">Votre Pays</label>
				<p><input type="text" name="pays" id="pays"></p>

			</fieldset>

			<fieldset>

				<legend>Identifiant de connexion</legend>

				<label for="email">Votre email</label>
				<p><input type="text" name="email" id="email"></p>

				<label for="mdp1">Votre mot de passe 1</label>
				<p><input type="password" name="mdp1" id="mdp1"></p>

				<label for="mdp2">Confirmer votre mail</label>
				<p><input type="password" name="mdp2" id="mdp2"></p>

			</fieldset>

		</fieldset>

		<input type="submit" name="valid"><a href="accueil.php">Retour page d'accueil</a>
	</form>

</body>
</html>