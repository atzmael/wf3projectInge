<?php

	//reponse_inscription

	require_once('inc_bdd.php');
	require_once('librairie.php');



	$champs = array("nom", "prenom", "pseudo", "function", "ville", "pays", "email", "mdp1", "mdp2");

	if(verif_form($_POST, $champs))
	{
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$pseudo = htmlentities($_POST['pseudo']);
		$function = htmlentities($_POST['function']);
		$ville = htmlentities($_POST['ville']);
		$pays = htmlentities($_POST['pays']);
		$email = htmlentities($_POST['email']);
		$mdp1 = htmlentities($_POST['mdp1']);
		$mdp2 = htmlentities($_POST['mdp2']);

		// verification email 
		$query = $db -> prepare('SELECT id_util FROM user WHERE email = :email');
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();


		$result = $query -> fetch();

		// si l'email n'est pas dans la base alors
		if(empty($result) == true)
		{
			//verification des mot de pass
			if($mdp1 == $mdp2)
			{
				$mot_de_passe = password_hash($mdp1, PASSWORD_DEFAULT); //cryptage sha1(md5($mdp1))

				if($mot_de_passe != false){

					$query = $db -> prepare("INSERT INTO user (firstname, lastname, pseudo, function, email, city, country, password, rank) VALUES (:firstname, :lastname, :pseudo, :function, :email, :city, :country, :password, :rank)");
					$query -> bindValue(':firstname', $nom, PDO::PARAM_STR);
					$query -> bindValue(':lastname', $prenom, PDO::PARAM_STR);
					$query -> bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
					$query -> bindValue(':function', $function, PDO::PARAM_STR);
					$query -> bindValue(':email', $email, PDO::PARAM_STR);
					$query -> bindValue(':city', $ville, PDO::PARAM_STR);
					$query -> bindValue(':country', $pays, PDO::PARAM_STR);
					$query -> bindValue(':password', $mot_de_passe, PDO::PARAM_STR);
					$query -> bindValue(':rank', 10, PDO::PARAM_STR);
					

					$query -> execute();

					echo "Vos données sont bien enregistrée sur le serveur";
					echo "<a href='accueil.php'>Retour à l'acceuil</a>";
				}
				else
				{
					echo "Une erreur est survenue lors du cryptage du mot de passe";
					echo "<a href='accueil.php'>Retour à l'acceuil</a>";
				}


			}
			else
			{
				echo "Vos mots de passe ne sont pas identique!";
			}
		}
		else
		{
			echo "<p>Votre email est déjà utilisé</p>";
		}




	}
	else
	{
		echo "<p>Vérifier que tous les champs du formulaire soient bien renseignés!!!</p>";
	}
?>