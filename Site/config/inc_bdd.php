<?php


		//inc-bdd.php

		// 1 déclaration des constantes

		define('HOST', 'localhost'); // en prod mettre ip serveur
		define('DB', 'balance_ton_code'); //le nom de la BDD
		define('USER', 'root'); // si en prod, penser a le changer
		define('PASS', ''); //si en prod penser a le changer

				

		//2 définir les options de connexion

		$db_options = array(

			//gestion des caractères accentués
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

			//choix de récupération des données (assoc /numérique)
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

			//pour afficher toutes les erreurs à commenter en production
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING

		);

		//3 faire la connexion

		

		try
		{
			$db = new PDO('mysql:host='.HOST. ';dbname='.DB, USER, PASS, $db_options);

		}
		catch(Exception $e)
		{
			error_log('['.$e->getcode().'] '.$e->getMessage(), 3, 'logs/mysql-errors.log');
		}

?>