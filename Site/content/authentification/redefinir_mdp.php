<?php

	require_once('inc_bdd.php');
	require_once('librairie.php');


	$champs = array('id', 'token');

	if(verif_form($_GET, $champs))
	{
		$query = $db -> prepare("SELECT * FROM token WHERE id = :id AND token_key = :token");
		$query -> bindValue(':id', $_GET['id'],PDO::PARAM_INT);
		$query -> bindValue(':token', $_GET['token'] ,PDO::PARAM_STR);
		$query -> execute();

		$result = $query -> fetch();

		if(!empty($result))
		{
			?>

			<!DOCTYPE html>
			<html>
			<head>
				<title>REDEFINIR MDP</title>
			</head>
			<body>

				<form method="POST" action="reponse_redefinir_mdp.php">
					
					<fieldset>

						<legend>Mot de passe</legend>

						<label for="mdp1">Votre mot de passe 1</label>
						<p><input type="password" name="mdp1" id="mdp1"></p>

						<label for="mdp2">Confirmer votre mot de passe</label>
						<p><input type="password" name="mdp2" id="mdp2"></p>

					</fieldset>

					<input type="hidden" name="id" value="<?= $_GET['id'];?>">
					<input type="submit" value="Envoyer">
				</form>

			</body>
			</html>

			<?php

		}

		else
		{
			echo "<p>L'ID et/ou le token ne correspondent pas !</p>";
		}
	}
	else
	{
		echo "<p>Il n'y à pas de token et ou d'ID dans l'adresse</p>";
	}
?>