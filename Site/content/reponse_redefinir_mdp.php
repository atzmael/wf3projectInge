<?php

	//reponse_redefinir_mdp.php

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	$champs = array('mdp1', 'mdp2', "id");

	if(verif_form($_POST, $champs))
	{
		$id = htmlentities($_POST['id']);
		$mdp1 = htmlentities($_POST['mdp1']);
		$mdp2 = htmlentities($_POST['mdp2']);

		if($mdp1 == $mdp2)
		{
			$mot_de_passe = password_hash($mdp1, PASSWORD_DEFAULT);

			$query = $db -> prepare("UPDATE user SET password = :password WHERE id_util = :id");

			$query -> bindValue(':password', $mot_de_passe, PDO::PARAM_STR);
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();

			$query = $db -> prepare("DELETE FROM token WHERE id = :id");
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();

			echo "<p>Votre mot de passe à bien été modifié</p>";
			echo "<a href='../index.php'>Accueil</a>";


		}
		else
		{
			echo "<p>les mots de passe ne coincide pas</p>";
			echo "<a href='../index.php'>Accueil</a>";
		}
	}
	else
	{
		echo "<p>Merci de vérifier les champs</p>";
		echo "<a href='../index.php'>Accueil</a>";
	}

?>