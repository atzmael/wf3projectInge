<?php
require_once('../config/inc_bdd.php');

if(!empty($_POST['saisi'])){

    $recherche_util = strip_tags($_POST['saisi']);
    $vote = strip_tags($_POST['optVote']);
    $date = strip_tags($_POST['optDate']);

    $sql = "SELECT id_article, title FROM article WHERE title LIKE :toto ORDER BY";

    if(!empty($vote)){
        $sql.= " vote ".$vote;
    }else {
        if(!empty($date)){
            $sql.= " id_article ".$date;
        }else {
            $sql.= " title ASC";
        }
    }

    $sql.= " LIMIT 10";

    $query = $db -> prepare($sql);
    $query -> bindValue(':toto', '%'.$recherche_util.'%', PDO::PARAM_STR);
    $query -> execute();

    $result = $query -> fetchAll();

    echo json_encode($result);

}else {
    echo json_encode('');
}

?>