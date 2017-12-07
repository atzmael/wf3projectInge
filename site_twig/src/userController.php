
<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/login', function () use ($app) {
   
    return $app['twig']->render('login.html.twig', array('session' => $app['session']->get('user')));
})
->bind('login')
;

//LOGIN
$app->post('/login', function () use ($app) {

  /*Verification de $_POST*/
    if(isset($_POST))
    {

        $userModels = new userModels();
        $user = $userModels->reponseConnexion($app, $_POST['email']);

        if($user)
        {
            $verif = password_verify($_POST['mot_de_passe'], $user['password']);
            if($verif)
            {
                //création de la variable session silex
                $app['session']->set('user', array(
                    'id_util' => $user['id_util'],
                    'pseudo' => $user['pseudo'],
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'rank'   => $user['rank']
                ));
                return $app->redirect($app["url_generator"]->generate("homepage"));
            }
        }
    }
    else
    {

    }
     return $app['twig']->render('login.html.twig', array('session'=>$app['session']->get('user')));
    
})
->bind('login_check')
;


// Page Profil utilisateur
$app->get('/profil', function () use ($app) {

    $model = new userModels();
    $user = $model->getUser($app, $app['session']->get('user'));

    return $app['twig']->render('profil.html.twig', array('user' => $user, 'session'=>$app['session']->get('user')));
})
->bind('profil')
;


//page de deconnexion

$app->get('/logout', function () use ($app) {

    $app['session']->remove('user');
    /*echo '<pre>';
    print_r($app['session']);
    echo '</pre>';*/
    return $app->redirect($app["url_generator"]->generate("homepage"));
})
->bind('logout')
;


//page d'inscription

$app->get('/signup', function () use ($app) {
    return $app['twig']->render('signup.html.twig', array('session'=>$app['session']->get('user')));
})
->bind('signup')
;

$app->post('/signup', function () use ($app){

    if(isset($_POST))
    {
        if($_POST['mdp1'] == $_POST['mdp2'])
        {
            $userModels = new userModels();
            $userinBase = $userModels->verifMail($app, $_POST['email']);

            if(!$userinBase)
            {
                $motdepassCrypt = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);

                $userModels->insertUser($app, $_POST, $motdepassCrypt);
            }
        }
    }
    return $app->redirect($app["url_generator"]->generate("homepage"));

})
->bind('valid_inscription')
;


