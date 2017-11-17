<?php

	//reponse_inscription

	require_once('inc_bdd.php');
	require_once('librairie.php');



	$champs = array("nom", "prenom", "date_naissance", "code_postal", "ville", "pays", "email", "mdp1", "mdp2");

	if(verif_form($_POST, $champs))
	{
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$date = htmlentities($_POST['date_naissance']);
		$code = htmlentities($_POST['code_postal']);
		$ville = htmlentities($_POST['ville']);
		$pays = htmlentities($_POST['pays']);
		$email = htmlentities($_POST['email']);
		$mdp1 = htmlentities($_POST['mdp1']);
		$mdp2 = htmlentities($_POST['mdp2']);

		// verification email 
		$query = $db -> prepare('SELECT id FROM utilisateur WHERE email = :email');
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();


		$result = $query -> fetch();

		// si l'email n'est pas dans la base alors
		if(empty($result) == true)
		{
			//verification des mot de pass
			if($mdp1 == $mdp2)
			{
				$mot_de_passe = md5($mdp1); //cryptage sha1(md5($mdp1))

				$query = $db -> prepare("INSERT INTO utilisateur (nom, prenom, date_naissance, code_postal, ville, pays, email, mot_de_passe, id_rang) VALUES (:nom, :prenom, :date_naissance, :code_postal, :ville, :pays, :email, :mot_de_passe, :id_rang)");
				$query -> bindValue(':nom', $nom, PDO::PARAM_STR);
				$query -> bindValue(':prenom', $prenom, PDO::PARAM_STR);
				$query -> bindValue(':date_naissance', $date, PDO::PARAM_STR);
				$query -> bindValue(':code_postal', $code, PDO::PARAM_STR);
				$query -> bindValue(':ville', $ville, PDO::PARAM_STR);
				$query -> bindValue(':pays', $pays, PDO::PARAM_STR);
				$query -> bindValue(':email', $email, PDO::PARAM_STR);
				$query -> bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
				$query -> bindValue(':id_rang', 4, PDO::PARAM_STR);

				$query -> execute();

				echo "Vos données sont bien enregistrée sur le serveur";
				echo "<a href='accueil.php'>Retour à l'acceuil</a>";


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