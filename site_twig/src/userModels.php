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
		$sql = 'SELECT pseudo, city, country FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid, PDO::PARAM_INT);
		$query -> execute();

    	return $query -> fetch();
	}

	public function myCode($app, $sessionid){
		$sql = "SELECT article.id_article, article.title, content_article.content, article.release_date, user.pseudo FROM article INNER JOIN user on article._id_util = user.id_util INNER JOIN content_article ON content_article._id_article = article.id_article WHERE article._id_util = :sessionid GROUP BY article.id_article ORDER BY article.id_article DESC LIMIT 25";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid, PDO::PARAM_INT);
		$query -> execute();

    	return $query -> fetchAll();
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

		return true;
	}

	public function deleteToken($app, $id){

		$sql = "DELETE FROM token WHERE id = :id_token";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id_token', $id, PDO::PARAM_INT);
		$query -> execute();

		return true;
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

	public function insertUser($app, $POST, $mdp){

		$sql = "INSERT INTO user (pseudo, firstname, lastname, function, email, city, country, password, rank) VALUES (:pseudo, :firstname, :lastname, :function, :email, :city, :country, :password, :rank)";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':pseudo', strip_tags($POST['pseudo']), PDO::PARAM_STR);
		$query -> bindValue(':firstname', strip_tags($POST['nom']), PDO::PARAM_STR);
		$query -> bindValue(':lastname', strip_tags($POST['prenom']), PDO::PARAM_STR);
		$query -> bindValue(':function', strip_tags($POST['function']), PDO::PARAM_STR);
		$query -> bindValue(':email', strip_tags($POST['email']), PDO::PARAM_STR);
		$query -> bindValue(':city', strip_tags($POST['ville']), PDO::PARAM_STR);
		$query -> bindValue(':country', strip_tags($POST['pays']), PDO::PARAM_STR);
		$query -> bindValue(':password', $mdp, PDO::PARAM_STR);
		$query -> bindValue(':rank', 10, PDO::PARAM_INT);
		$query -> execute();

		return true;
	}

	public function modifUserProfile($app, $POST, $session){

		$sql = 'UPDATE user SET pseudo = :pseudo, city = :city, country = :country WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':pseudo', strip_tags($POST['pseudo']), PDO::PARAM_STR);
		$query -> bindValue(':city', strip_tags($POST['city']), PDO::PARAM_STR);
		$query -> bindValue(':country', strip_tags($POST['country']), PDO::PARAM_STR);
		$query -> bindValue(':sessionid', $session, PDO::PARAM_INT);
		$query -> execute();

		return true;
	}

	public function getToken($app, $id){

		$sql = 'SELECT * FROM token WHERE id = :id';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id', $id, PDO::PARAM_INT);
		$query -> execute();
		return $query -> fetch();
	}

	public function insertToken($app, $id, $token){
		$sql = "INSERT INTO token VALUES (:id, :token)";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id', $id, PDO::PARAM_INT);
		$query -> bindValue(':token', $token, PDO::PARAM_STR);
		$query -> execute();
		return true;
	}

	public function updateToken($app, $id, $token){
		$sql = "UPDATE token SET token_key = :token WHERE id = :id";
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':id', $id, PDO::PARAM_INT);
		$query -> bindValue(':token', $token, PDO::PARAM_STR);
		$query -> execute();
		return true;
		}

	public function formContact($app, $sessionid){
	 	$sql = 'SELECT pseudo, email FROM user WHERE id_util = :sessionid';
		$query = $app['db']->prepare($sql);
		$query -> bindValue(':sessionid', $sessionid, PDO::PARAM_INT);
    	$query -> execute();
    	return $query -> fetch();
    }


	
}
