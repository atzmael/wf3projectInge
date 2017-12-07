
<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/admin', function () use ($app) {

    $user = $app['session']->get('user');

    if($user['rank'] == 1){

        $model = new adminModels();
        $content = $model->getAdminPage($app);

        return $app['twig']->render('admin.html.twig', array('contenu' => $content));
    }
    else
    {
        return $app['twig']->render('errors/404.html.twig', array());
    }
})
    ->bind('admin')
;

$app->get('/admin_modif_code/{id}', function ($id) use ($app){

    $user = $app['session']->get('user');

    if($user['rank'] == 1) {

        $model = new adminModels();
        $article = $model->afficheArticle($app, $id);
        $contenu = explode('|||', $article['content']);

        return $app['twig']->render('admin_modif_code.html.twig', array('article' => $article, 'contenu' => $contenu));
    }
})
    ->bind('admin_modif')
;

// Creer la route post admin modif code


