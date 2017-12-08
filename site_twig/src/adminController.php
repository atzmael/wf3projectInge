
<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/admin', function () use ($app) {

    $user = $app['session']->get('user');

    if($user['rank'] == 1){

        $model = new adminModels();
        $content = $model->getAdminPage($app);

        return $app['twig']->render('admin.html.twig', array('content' => $content, 'session' => $user));
    }
    else
    {
        return $app['twig']->render('errors/404.html.twig', array());
    }
})
    ->bind('admin')
;




