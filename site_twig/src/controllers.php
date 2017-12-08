<?php




use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


require __DIR__.'/../src/articleController.php';
require __DIR__.'/../src/userController.php';
require __DIR__.'/../src/adminController.php';
require __DIR__.'/../src/searchController.php';
//Request::setTrustedProxies(array('127.0.0.1'));

//HOMEPAGE
$app->get('/', function () use ($app) {
    $model = new articleModels();
    $index = $model->countArticle($app);
    $article = $model->afficheCode($app);
    
    return $app['twig']->render('index.html.twig', array('index' => $index, 'article' => $article, 'session'=>$app['session']->get('user')));
})
->bind('homepage')
;



                                                                                

//MENTIONS LEGALES
$app->get('/mentions_legales', function () use ($app) {

    return $app['twig']->render('mentions_legales.html.twig', array('session'=>$app['session']->get('user')));
})
->bind('mentions')
;

//CONTACT
$app->get('/contact', function () use ($app) {
    $model = new userModels();
    $id = 2;
    if(isset($id))
    {
        $contact = $model->formContact($app, $id);
    

        return $app['twig']->render('contact.html.twig', array('contact' => $contact, 'session'=>$app['session']->get('user')));
    }
    else
    {
        return $app['twig']->render('contact.html.twig', array('session'=>$app['session']->get('user')));
    }
})
->bind('contact')
;

$app->post('/contact', function () use ($app) {

    if(isset($_POST))
    {
        $pseudo = strip_tags($_POST['pseudo']);
        $email = strip_tags($_POST['email']);
        $titre = strip_tags($_POST['titre']);
        $contenu = strip_tags($_POST['message']);

        $message = (new \Swift_Message($titre))
        ->setFrom(array($email))
        ->setTo(array('damien.flogny@gmail.com'))
        ->setBody($contenu);

    $app['mailer']->send($message);
    }
    return $app['twig']->render('contact.html.twig', array('session'=>$app['session']->get('user')));

})
->bind('sendContact')
;


//FAQ
$app->get('/faq', function () use ($app) {

    return $app['twig']->render('faq.html.twig', array('session'=>$app['session']->get('user')));
})
->bind('faq')
;


$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
