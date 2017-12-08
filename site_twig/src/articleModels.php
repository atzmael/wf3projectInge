<?php

use Doctrine\DBAL\Connection;

class articleModels {

    //FOR INDEX.PHP
    public function countArticle($app){
        $sql = "SELECT DISTINCT language.language_name, (SELECT count(id_article) FROM article WHERE article._id_lang = language.id_lang) as nb, (SELECT article.title FROM article WHERE article._id_lang = language.id_lang ORDER BY id_article DESC LIMIT 1) as lastArticle, (SELECT article.id_article FROM article WHERE article._id_lang = language.id_lang ORDER BY id_article DESC LIMIT 1) as lastIdArticle FROM `language` INNER JOIN article WHERE article._id_lang = language.id_lang";

        return $app['db']->fetchAll($sql);

    }

    //FOR Affiche code php
    public function afficheCode($app){
        $sql = "SELECT article.id_article, article.title, content_article.content, article.release_date, user.pseudo FROM article INNER JOIN user on article._id_util = user.id_util INNER JOIN content_article ON content_article._id_article = article.id_article GROUP BY article.id_article ORDER BY article.id_article DESC LIMIT 9";

        return $app['db']->fetchAll($sql);
    }

    //FOR article.php
    public function afficheArticle($app, $id){

        $app['db'] -> query('SET SESSION group_concat_max_len = 10000000');

        $sql = "SELECT article.id_article, article.title, article.description, article.release_date, article.vote, user.pseudo, user.id_util, GROUP_CONCAT(content_article.content SEPARATOR '|||') AS content FROM article 
    						JOIN user ON article._id_util = user.id_util 
    						JOIN content_article ON content_article._id_article = article.id_article
    						WHERE id_article = :id GROUP BY article.id_article";
        $query = $app['db'] -> prepare($sql);
        $query -> bindValue(':id', $id, PDO::PARAM_INT);
        $query -> execute();

        return $query -> fetch();

        // A insérer dans le controleur $contenu = explode('|||', $result['content']);
    }


    //Multi Index language
    public function getIndex($app, $langName){

        $sql = "SELECT article.id_article, article.title, article.description, article.release_date, article.vote, user.pseudo, language.language_name 		
				FROM article 
				JOIN user ON article._id_util = user.id_util 
				JOIN language ON article._id_lang = language.id_lang
				WHERE language.language_name = :langName";
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':langName', $langName, PDO::PARAM_INT);
        $query -> execute();

        return $query -> fetchAll();
    }

    //Menu insert code.php
    public function menuInsertcode($app){

        $sql = "SELECT DISTINCT id_lang, language_name FROM language ORDER BY id_lang ASC";
        return $app['db']->fetchAll($sql);
    }

    //Insert article from user
    public function insertArticle($app, $session, $post){
        $sql = 'INSERT INTO article (title, description, _id_util, _id_lang, release_date) VALUES (:title, :description, :id_util, :id_lang, NOW())';
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':title', strip_tags($post['title']), PDO::PARAM_STR);
        $query -> bindvalue(':description', strip_tags($post['description']), PDO::PARAM_STR);
        $query -> bindvalue(':id_util', $session['id_util'], PDO::PARAM_INT);
        $query -> bindvalue(':id_lang', $post['id_lang'], PDO::PARAM_INT);
        $query -> execute();

        return true;
    }

    public function getIdCodeByUser($app, $session){
        $sql = "SELECT id_article FROM article WHERE _id_util = :session ORDER BY id_article DESC";
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':session', $session['id_util'], PDO::PARAM_STR);
        $query -> execute();

        return $query -> fetch();
    }

    public function insertContentfromArticle($app, $id_article, $content ){

        $sql = 'INSERT INTO content_article(content, _id_article) VALUES (:content, :id_article)';
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':content', htmlentities($content), PDO::PARAM_STR);
        $query -> bindvalue(':id_article', $id_article, PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    public function getSearch($app, $recherche_util, $vote, $date){

        $sql = "SELECT id_article, title FROM article WHERE title LIKE :toto ORDER BY";

        if(!empty($vote))
        {
            $sql.= " vote ".$vote;
        }
        else
        {
            if(!empty($date))
            {
                $sql.= " id_article ".$date;
            }
            else
            {
                $sql.= " title ASC";
            }
        }

        $sql.= " LIMIT 10";

        $query = $app['db']-> prepare($sql);
        $query -> bindValue(':toto', '%'.$recherche_util.'%', PDO::PARAM_STR);
        $query -> execute();

        return $query -> fetchAll();
    }

    // public function triVote($app, $vote, $date){
    // 	$sql = 'SELECT article.title, article.description, article.content, article.release_date, article.vote, user.pseudo from article JOIN user ON article._id_util = user.id_util order by article.vote '.$vote.', id_article '.$date.' LIMIT 10';

    // 	return $app['db']->fetch($sql);
    // }

    public function recupContentArticle($app, $id){

        $sql = 'SELECT * FROM content_article WHERE _id_article = :id';
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query -> fetchAll();
    }


    public function updateArticle($app, $id, $post){
        $sql = 'UPDATE article SET title = :title, description = :description WHERE id_article = :id_article';
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':title', strip_tags($post['title']), PDO::PARAM_STR);
        $query -> bindvalue(':description', strip_tags($post['description']), PDO::PARAM_STR);
        $query -> bindvalue(':id_article', $id, PDO::PARAM_INT);
        $query -> execute();

        return true;
    }

    public function updateContentfromArticle($app, $id, $post ){

        $sql = 'UPDATE content_article SET content = :content WHERE id = :id' ;
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':content', htmlentities($post), PDO::PARAM_STR);
        $query -> bindvalue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        return true;
    }



    public function deleteArticle($app, $idarticle){

        $sql = 'DELETE * FROM article WHERE id_article = :idarticle';
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':idarticle', $idarticle, PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    public function deleteContent($app, $idarticle){

        $sql = 'DELETE * FROM content_article WHERE _id_article = :idarticle';
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':idarticle', $idarticle, PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    public function getComments($app, $id) {
        $sql = "SELECT *, user.pseudo FROM comment JOIN user ON comment._id_util = user.id_util WHERE comment._id_article = :id_article ORDER BY id_com DESC";
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':id_article', $id, PDO::PARAM_STR);
        $query -> execute();

        return $query -> fetchAll();
    }

    public function setComments($app, $id, $post) {

        $sql = 'INSERT INTO comment(content, release_date, _id_article, _id_util) VALUES (:content, NOW(), :id_article, :_id_util)';
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':content', strip_tags($post['content']), PDO::PARAM_STR);
        $query -> bindvalue(':id_article', $id, PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    public function updateComments($app, $id, $post){

        $sql = 'UPDATE comment SET content = :content, _id_article = :id_article, release_date = NOW() WHERE id_com = :id' ;
        $query = $app['db']->prepare($sql);
        $query -> bindvalue(':content', strip_tags($post['content']), PDO::PARAM_STR);
        $query -> bindvalue(':id_article', $id, PDO::PARAM_INT);

        $query->execute();

        return true;
    }

    public function deleteComments($app, $id){
        $sql = "DELETE FROM comment WHERE id_com = :id";
        $query = $app['db']->prepare($sql);
        $query -> bindValue(':id_com', $id, PDO::PARAM_INT);
        $query -> execute();

        return true;

    }
}