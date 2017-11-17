<?php

//LIBRAIRIE

function table_num($tab)
{
    echo "<table>";

    foreach ($tab as $value) {
        echo "<tr><td>".$value."</td></tr>";
    }

    echo "</table>";
}

function table_assoc($tab)
{
    echo "<table>";

    foreach ($tab as $key => $value) {
        echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
    }

    echo "</table>";
}

function verif_form($superglobale, $tableau)
{
    foreach ($tableau as $valeur)
    {
        if(!isset($superglobale[$valeur]))
        {
            return false;
        }
        if(empty($superglobale[$valeur]))
        {
            return false;
        }
    }
    return true;
}

function affiche_resultat($resultat)
{
    // si le résultat n'est pas vide
    if(!empty($resultat))
    {
        echo "<table>";

        // gestion des noms de colonnes
        echo "<tr id='head'>";
        foreach ($resultat[0] as $key => $value) {
            echo "<td>".$key."</td>";
        }
        echo "</tr>";

        // gestion des données
        foreach ($resultat as $sstab) {
            echo "<tr>";
            foreach ($sstab as $value) {

                echo "<td>".$value."</td>";

            }
            echo "</tr>";
        }

        echo "</table>";
    }
    // si le résultat est vide
    else
    {
        echo "Pas de résultat";
    }
}

function debug($tab){
    echo "<pre>";
    print_r($tab);
    echo "</pre>";
}


function directory(){
    $dir = $_SERVER['SCRIPT_FILENAME'];
    return preg_replace('/[a-z0-9#&?._=-]*$/i','',$dir);
}
define('__DIR__',directory());



?>