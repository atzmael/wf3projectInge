<?php

$app->get('/recherche', function () use ($app){

    $user = $app['session']->get('user');

    return $app['twig']->render('recherche.html.twig', array('session'=> $user));
})
    ->bind('recherche')
;



$app->post('/recherche', function () use ($app){

    $user = $app['session']->get('user');

    $recherche_util = strip_tags($_POST['saisi']);
    $vote = strip_tags($_POST['optVote']);
    $date = strip_tags($_POST['optDate']);

    $model = new articleModels();

    $research = $model->getSearch($app, $recherche_util, $vote, $date);

    return $research =  json_encode($research);
})
->bind('recherche_send')
;

