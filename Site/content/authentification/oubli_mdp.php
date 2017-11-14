<?php

	// oubli_mdp.php

	require_once('inc_bdd.php');
	require_once('librairie.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>OUBLI DE MOT DE PASSE</title>
</head>
<body>

	<form method="POST" action="reponse_oubli_mdp.php">

		<fieldset>

			<legend>Email à reinitialiser</legend>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email">

		<input type="submit" value="Envoyer">

		</fieldset>

	</form>

</body>
</html>