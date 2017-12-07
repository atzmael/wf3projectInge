<?php


//INDEX LANGUAGE
$app->get('/codes/{langName}', function ($langName) use ($app) {
    $model = new articleModels();
    $page = $model->getIndex($app, $langName);

    return $app['twig']->render('codes.html.twig', array('codes' => $page, 'session'=>$app['session']->get('user')));
})
    ->bind('codes')
;

//PAGE ARTICLE
$app->get('/article/{id}', function ($id) use ($app) {
    $model = new articleModels();
    $article = $model->afficheArticle($app, $id);
    $contenu = explode('|||', html_entity_decode($article['content']));

    $moy = round($article['vote']);
    $reste = 5 - $moy;
    $article['vote'] = array('vote' => $article['vote'],'moy' => $moy, 'reste' => $reste);

    return $app['twig']->render('article.html.twig', array('article' => $article, 'content' => $contenu, 'session'=>$app['session']->get('user')));
})
    ->bind('article')
;

// Menu insertion code

$app->get('/newarticle', function () use ($app) {
    $model = new articleModels();
    $article = $model->menuInsertcode($app);

    return $app['twig']->render('newarticle.html.twig', array('article' => $article, 'session'=>$app['session']->get('user')));
})
    ->bind('newarticle')
;

// Insert article from user

$app->post('/newarticle', function () use ($app){

    if(isset($_POST))
    {
        $articleModel = new articleModels();
        $articleModel->insertArticle($app, $app['session']->get('user'), $_POST);

        $id_article = $articleModel->getIdCodeByUser($app, $app['session']->get('user'));
        $id = $id_article['id_article'];
        $nb_insert = $_POST['nb_ajout_content'];


        for($i=1;$i<=$nb_insert;$i++){

            $contenu = $_POST['content'.$i];

            $articleModel->insertContentfromArticle($app, $id, $contenu);
        }

        return $app->redirect('article/'.$id);
    }
    //Message à gerer plusieur
})
    ->bind('article_insert')
;

