<?php

	require_once('inc_bdd.php');
	require_once('librairie.php');


	$champs = array('email', 'mot_de_passe');

	if(verif_form($_POST, $champs))
	{
		$email = htmlentities($_POST['email']);
		$mot_de_passe = htmlentities($_POST['mot_de_passe']);

		

		//verifier si email existe en base et preparation du mot de passe

		$query = $db -> prepare("SELECT id_util, firstname, lastname, password FROM user WHERE email = :email");
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();

		$result = $query -> fetch();

		if(!empty($result))
		{
			$mdp_base = $result['password']; //mot_de_passe

			//verifier mot de passe

			if(password_verify($mot_de_passe, $mdp_base))
			{
				session_start();
				$_SESSION['id'] = $result['id_util'];
				$_SESSION['nom'] = $result['firstname'];
				$_SESSION['prenom'] = $result['lastname'];
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