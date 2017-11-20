<?php

require_once('../config/inc_bdd.php');

if(!empty($_POST['saisi']) && !empty($_POST['optDate'])){

    $date = $_POST['optDate'];
    $vote = $_POST['optVote'];

    $req = $db -> query('SELECT article.title, article.description, article.content, article.release_date, article.vote, user.pseudo from article JOIN user ON article._id_util = user.id_util order by article.vote '.$vote.', id_article '.$date.' LIMIT 10');

    $result = $req -> fetchAll();

    echo json_encode($result);

}else {
    echo json_encode('');
}


?>