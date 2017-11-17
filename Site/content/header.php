<?php

session_start();

$dir = $_SERVER['SCRIPT_FILENAME'];
$folder = preg_replace('/[a-z0-9#&?._=-]*$/i','',$dir);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Balance ton code</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
<div class="loader" aria-hidden="true">
    <img src="../assets/img/loader.gif" alt="Image de chargement de la page" aria-hidden="true">
</div>

<div class="page">
    <header>
        <nav>
            <div class="logo">
                <img src="../assets/" alt="">
            </div>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>
    </header>