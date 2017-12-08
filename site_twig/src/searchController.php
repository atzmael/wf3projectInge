<?php

$app->post('/recherche', function () use ($app){

    $recherche_util = strip_tags($_POST['saisi']);
    $vote = strip_tags($_POST['optVote']);
    $date = strip_tags($_POST['optDate']);

    $model = new articleModels();

    $research = $model->getSearch($app, $recherche_util, $vote, $date);

    return json_encode($research);
})
->bind('recherche')
;

