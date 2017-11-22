<?php

	//reponse_inscription
	session_start();

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	if(isset($_SESSION['id']))
	{

		$champs = array("pseudo", "firstname", "lastname", "city", "country");

		if(verif_form($_POST, $champs))
		{
			$pseudo = htmlentities($_POST['pseudo']);
			$firstname = htmlentities($_POST['firstname']);
			$lastname = htmlentities($_POST['lastname']);
			$city = htmlentities($_POST['city']);
			$country = htmlentities($_POST['country']);
			

			// verification email 
			$query = $db -> prepare('UPDATE user SET pseudo = :pseudo, firstname = :firstname, lastname = :lastname, city = :city, country = :country WHERE id_util ='.$_SESSION['id']);
			$query -> bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$query -> bindValue(':firstname', $firstname, PDO::PARAM_STR);
			$query -> bindValue(':lastname', $lastname, PDO::PARAM_STR);
			$query -> bindValue(':city', $city, PDO::PARAM_STR);
			$query -> bindValue(':country', $country, PDO::PARAM_STR);

			$query -> execute();

			echo "vos données ont été modifiées";

		}
		else
		{
			echo "Problème de modification";
		}
	}
	else
	{
		echo "vous n etes pas connecté";
	}