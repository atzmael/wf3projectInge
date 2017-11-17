<?php

	require_once('librairie.php');
	require_once('inc_bdd.php');

	$query = $db -> prepare("SELECT article.title, article.content, article.release_date, user.pseudo FROM article inner join user on article._id_util = user.id_util ORDER BY id_article DESC");

	// 2 requêtes


	$query->execute();


	//3 récupération des résultats
	$result = $query -> fetchAll();

	print_r($result);
	
?>