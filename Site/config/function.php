<?php

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