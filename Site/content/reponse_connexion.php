<?php

	require_once('inc_bdd.php');
	require_once('librairie.php');


	$champs = array('email', 'mot_de_passe');

	if(verif_form($_POST, $champs))
	{
		$email = htmlentities($_POST['email']);
		$mot_de_passe = htmlentities($_POST['mot_de_passe']);

		$mot_de_passe = md5($mot_de_passe);

		//verifier si email existe en base et preparation du mot de passe

		$query = $db -> prepare("SELECT id, nom, prenom, mot_de_passe FROM utilisateur WHERE email = :email");
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();

		$result = $query -> fetch();

		if(!empty($result))
		{
			$mdp_base = $result['mot_de_passe'];

			//verifier mot de passe

			if($mot_de_passe == $mdp_base)
			{
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['nom'] = $result['nom'];
				$_SESSION['prenom'] = $result['prenom'];
				echo "<p>Vous êtes connecté !</p>";
				echo "<p><a href='accueil.php'>Retour à l'accueil</a></p>";
				
			}
			else
			{
				echo "<p>Le mot de passe n'est pas valide!</p>";
			}
		}
		else
		{
			echo "Votre adresse email n'existe pas!";
		}
	}
	else
	{
		echo "<p>Echec d'authentification</p>";
	}
?>