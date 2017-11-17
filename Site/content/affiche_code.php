<?php


$query = $db -> prepare("SELECT * FROM article ORDER BY id_article DESC");

// 1 requêtes

$query->execute();


//3 récupération des résultats
$result = $query -> fetchAll();

?>