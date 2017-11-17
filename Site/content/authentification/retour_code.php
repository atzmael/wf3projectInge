<?php

	require_once('librairie.php');
	require_once('inc_bdd.php');

	session_start();
	if(isset($_SESSION['id']))
	{

		$champs = array('title', 'content', 'id_lang');

		if(verif_form($_POST, $champs))
		{
			$query = $db -> prepare('INSERT INTO article (title, content,_id_util, _id_lang, release_date) VALUES (:title, :content, :id_util, :id_lang, NOW() )');
			$query -> bindvalue(':title', htmlentities($_POST['title']), PDO::PARAM_STR);
			$query -> bindvalue(':content', htmlentities($_POST['content']), PDO::PARAM_STR);
			$query -> bindvalue(':id_util', htmlentities($_SESSION['id']), PDO::PARAM_INT);
			$query -> bindvalue(':id_lang', htmlentities($_POST['id_lang']), PDO::PARAM_STR);
			$query -> execute();

			echo "Votre code à été soumis";
		}
		else
		{
			echo "il n'y à que 2 champs à remplir ce n'est pas si compliqué!!!";
		}

	}
	else
	{
		echo "vous n'êtes pas connecté";
	}


?> 