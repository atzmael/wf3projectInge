<?php

use Doctrine\DBAL\Connection;

class userModels {

	public function getContact($app, $sessionid){
		$sql = 'SELECT * FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid['id_util'], PDO::PARAM_INT);
	    $query -> execute();

	    return $query -> fetch();
	}

    public function getUser($app, $sessionid){
		$sql = 'SELECT pseudo, firstname, lastname, email, city, country, registration, function, rank, nb_article, nb_comment FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid['id_util'], PDO::PARAM_INT);
		$query -> execute();

    	return $query -> fetch();
	}

	public function modifProfil($app, $sessionid){
		$sql = 'SELECT pseudo, firstname, lastname, city, country FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid['id_util'], PDO::PARAM_INT);
		$query -> execute();

    	return $query -> fetch();
	}

	public function myCode($app, $sessionid){
		$sql = 'SELECT id_article, title FROM article WHERE article._id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid['id_util'], PDO::PARAM_INT);
		$query -> execute();

    	return $query -> fetch();
	}

	// GET MOT DE PASSE
	public function getMdp($app, $id, $token){
		$sql = "SELECT * FROM token WHERE id = :id AND token_key = :token";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id', $id, PDO::PARAM_INT);
		$query -> bindValue(':token', $token ,PDO::PARAM_STR);
		$query -> execute();

		return $query -> fetch();
	}

	// SET MOT DE PASSE
	public function setMdp($app, $password, $id_util){
		$sql = "UPDATE user SET password = :password WHERE id_util = :id_util";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':password', $password, PDO::PARAM_STR);
		$query -> bindValue(':id_util', $id_util, PDO::PARAM_INT);
		$query -> execute();

		return $query -> fetch();
	}

	public function deleteToken($app, $id_token){

		$sql = "DELETE FROM token WHERE id = :id_token";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id_token', $id, PDO::PARAM_INT);
		$query -> execute();

		return $query -> fetch();
	}

	public function reponseConnexion($app, $email){
		$sql = "SELECT id_util, pseudo, firstname, lastname, password, rank FROM user WHERE email = :email";
		$query = $app['db']->prepare($sql);
    	$query -> bindValue(':email', $email, PDO::PARAM_STR);
    	$query -> execute();

    	return $query -> fetch();
	}

	public function verifMail($app, $email){
		$sql = 'SELECT id_util FROM user WHERE email = :email';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();

		return $query -> fetch();
	}

	public function insertUser($app, $nom, $prenom, $function, $ville, $pays, $email, $mot_de_passe){

		$sql = "INSERT INTO user (firstname, lastname, function, email, city, country, password, rank) VALUES (:firstname, :lastname, :function, :email, :city, :country, :password, :rank)";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':firstname', $nom, PDO::PARAM_STR);
		$query -> bindValue(':lastname', $prenom, PDO::PARAM_STR);
		$query -> bindValue(':function', $function, PDO::PARAM_STR);
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> bindValue(':city', $ville, PDO::PARAM_STR);
		$query -> bindValue(':country', $pays, PDO::PARAM_STR);
		$query -> bindValue(':password', $mot_de_passe, PDO::PARAM_STR);
		$query -> bindValue(':rank', 10, PDO::PARAM_INT);
		$query -> execute();

		return $query -> fetch();
	}

	public function modifUserProfile($app, $sessionid, $pseudo, $firstname, $lastname, $city, $country){

		$sql = 'UPDATE user SET pseudo = :pseudo, firstname = :firstname, lastname = :lastname, city = :city, country = :country WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$query -> bindValue(':firstname', $firstname, PDO::PARAM_STR);
		$query -> bindValue(':lastname', $lastname, PDO::PARAM_STR);
		$query -> bindValue(':city', $city, PDO::PARAM_STR);
		$query -> bindValue(':country', $country, PDO::PARAM_STR);
		$query -> bindValue(':sessionid', $sessionid, PDO::PARAM_INT);
		$query -> execute();

		return $query -> fetch();
	}

	public function getToken($app, $id_token){

		$sql = 'SELECT * FROM token WHERE id = :id_token';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id_token', $id_token, PDO::PARAM_INT);
		$query -> execute();
		return $query -> fetch();
	}

	public function insertToken($app, $id_token, $token){
		$sql = "INSERT INTO token VALUES (:id_token, :token)";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id_token', $id_token, PDO::PARAM_INT);
		$query -> bindValue(':token', $token, PDO::PARAM_STR);
		$query -> execute();
		return $query -> fetch();
	}

	public function updateToken($app, $id_token, $token){
		$sql = "UPDATE token SET token_key = :token WHERE id = :id_token";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id_token', $id_token, PDO::PARAM_INT);
		$query -> bindValue(':token', $token, PDO::PARAM_STR);
		$query -> execute();
		return $query -> fetch();
	}

	public function formContact($app, $sessionid){
	 	$sql = 'SELECT pseudo, email FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid, PDO::PARAM_INT);
    	$query -> execute();
    	return $query -> fetch();
    }


	
}
