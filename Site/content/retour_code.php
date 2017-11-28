<?php

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	session_start();
	if(isset($_SESSION['id']))
	{

		$champs = array('title', 'description', 'id_lang');

		if(verif_form($_POST, $champs))
		{
			$query = $db -> prepare('INSERT INTO article (title, description,_id_util, _id_lang, release_date) VALUES (:title, :description, :id_util, :id_lang, NOW() )');
			$query -> bindvalue(':title', htmlentities($_POST['title']), PDO::PARAM_STR);
			$query -> bindvalue(':description', htmlentities($_POST['description']), PDO::PARAM_STR);
			$query -> bindvalue(':id_util', htmlentities($_SESSION['id']), PDO::PARAM_INT);
			$query -> bindvalue(':id_lang', htmlentities($_POST['id_lang']), PDO::PARAM_STR);
			$query -> execute();
		}


		$query_select = $db->query("SELECT id_article FROM article WHERE _id_util =".$_SESSION['id']." ORDER BY id_article DESC");
		$result = $query_select->fetch();

		$nb_insert = $_POST['nb_ajout_content'];
		$id = $result['id_article'];

		for($i=1;$i<=$nb_insert;$i++){
			$content = $_POST['content'.$i];

			$query = $db -> prepare('INSERT INTO content_article(content, _id_article) VALUES (:content, :id_article)');

			$query -> bindvalue(':content', htmlentities($content), PDO::PARAM_STR);
			$query -> bindvalue(':id_article', htmlentities($id), PDO::PARAM_STR);
			$query->execute();
		}

		echo json_encode($id);

	}
	else
	{
		echo "vous n'êtes pas connecté";
	}


?> 