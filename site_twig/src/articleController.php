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
    $comment = $model->getComments($app, $id);

    $moy = round($article['vote']);
    $reste = 5 - $moy;
    $article['vote'] = array('vote' => $article['vote'],'moy' => $moy, 'reste' => $reste);

    return $app['twig']->render('article.html.twig', array('article' => $article, 'content' => $contenu, 'session'=>$app['session']->get('user'), 'comment'=>$comment));
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

// UPDATE article

$app->get('/modif_code/{id}', function ($id) use ($app){

    $user = $app['session']->get('user');

    $model = new articleModels();
    $article = $model->afficheArticle($app, $id);
    $champs = $model->recupContentArticle($app, $id);
    $article['nb_content'] = sizeof($champs);

    foreach($champs as $value){
        $value['content'] = html_entity_decode($value['content']);
    }

    return $app['twig']->render('modif_code.html.twig', array('article' => $article, 'session' => $user, 'champs' => $champs));
})
    ->bind('modif_code')
;

// POST modif code

$app->post('/modif_code/{id}', function ($id) use ($app){

    if(isset($_POST))
    {
        $articleModel = new articleModels();

        $articleModel ->updateArticle($app, $id, $_POST);

            $contenu = $_POST['content'];
            foreach($contenu as $key => $value){
                $articleModel->updateContentfromArticle($app, $key, $value);
            }

        return $app->redirect($app["url_generator"]->generate("article", array('id' => $id)));
    }
    //Message à gerer plusieur
})
    ->bind('code_modifie')
;

$app->get('/suppr_Article/{id}', function ($id) use ($app){

    $user = $app['session']->get('user');
    $model = new articleModels();

    $article = $model->afficheArticle($app, $id);

    return $app->render('suppr_article.html.twig', array('session'=>$user, 'content'=>$article));
})
->bind('suppr')
;

$app->post('/suppr_Article/{id}', function ($id) use ($app){

    $user = $app['session']->get('user'); 
    $model = new articleModels();  

    $model->deleteComments($app, $id);
    $model->deleteContent($app, $id);
    $model->deleteArticle($app, $id);

    return $app->redirect($app["url_generator"]->generate("mycode", array()));
})
->bind('suppr_valid')
;

