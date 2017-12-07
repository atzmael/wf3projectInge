<?php

use Doctrine\DBAL\Connection;

class adminModels {

	public function getAdminPage($app){
		$sql = "SELECT *, language.language_name, user.pseudo FROM article INNER JOIN language ON article._id_lang = language.id_lang INNER JOIN user ON user.id_util = article._id_util";
		return $app['db']->fetchAll($sql);
	}

	//Ajouter requete admin_modif_code

	
}

