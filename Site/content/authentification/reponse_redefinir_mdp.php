<?php

	//reponse_redefinir_mdp.php

	require_once('inc_bdd.php');
	require_once('librairie.php');

	$champs = array('mdp1', 'mdp2', "id");

	if(verif_form($_POST, $champs))
	{
		$id = htmlentities($_POST['id']);
		$mdp1 = htmlentities($_POST['mdp1']);
		$mdp2 = htmlentities($_POST['mdp2']);

		if($mdp1 == $mdp2)
		{
			$mot_de_passe = md5($mdp1);

			$query = $db -> prepare("UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE id = :id");

			$query -> bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();

			$query = $db -> prepare("DELETE FROM token WHERE id = :id");
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();

			echo "<p>Votre mot de passe à bien été modifié</p>";
			echo "<a href='accueil.php'>Accueil</a>";


		}
		else
		{
			echo "<p>les mots de passe ne coincide pas</p>";
			echo "<a href='accueil.php'>Accueil</a>";
		}
	}
	else
	{
		echo "<p>Merci de vérifier les champs</p>";
		echo "<a href='accueil.php'>Accueil</a>";
	}

?>