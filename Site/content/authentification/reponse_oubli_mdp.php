<?php


	require_once('inc_bdd.php');
	require_once('librairie.php');

	$champs = array('email');
	if(verif_form($_POST, $champs))
	{
		$email = htmlentities($_POST['email']);

		//verifier si email existe en base et preparation du mot de passe

		$query = $db -> prepare("SELECT id_util FROM user WHERE email = :email");
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();

		$result = $query -> fetch();

		if(!empty($result))
		{
			$id = $result['id_util'];

			$token = md5(uniqid(rand(),true));

			$query = $db -> prepare("INSERT INTO token VALUES (:id, :token)");
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> bindValue(':token', $token, PDO::PARAM_STR);
			$query -> execute();

			echo "<p>Voici le lien pour redefinir votre mdp :</p>";
			echo "<p><a href='redefinir_mdp.php?id=".$id."&token=".$token."'>LIEN</a></p>";


		}
		else
		{
			echo "<p>l'adresse email n'existe pas!</p>";
		}

	}
	else
	{
		echo "<p> Vérifier votre adresse mail</p>";
	}

?>