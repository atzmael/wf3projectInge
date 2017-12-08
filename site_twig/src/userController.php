
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

$app->get('/modif_profil', function () use ($app){

    $user = $app['session']->get('user');
    $sessionid = $user['id_util'];

    $userProfil = new userModels();
    $profil = $userProfil->modifProfil($app, $sessionid);

    return $app['twig']->render('modif_profil.html.twig', array('profil'=>$profil, 'session'=>$user));
})
->bind('modif_profil')
;

$app->post('/modif_profil', function () use ($app){


    $user = $app['session']->get('user');
    $sessionid = $user['id_util'];

    $userProfil = new userModels();
    $userProfil->modifUserProfile($app, $_POST, $sessionid);

    return $app->redirect('profil');
})
->bind('profil_modifie')
;

$app->get('/mycode', function () use ($app){

    $user = $app['session']->get('user');
    $sessionid = $user['id_util'];

    $model = new userModels();
    $mycode = $model->myCode($app, $sessionid);

    return $app['twig']->render('mycode.html.twig', array('session'=>$user, 'code'=>$mycode));
})
->bind('mycode')
;

$app->get('/oubli_mot_de_passe', function () use ($app){

    $user = $app['session']->get('user');

    return $app['twig']->render('oubli_mdp.html.twig', array('session'=>$user));
})
->bind('oubli_mdp')
;

$app->post('/oubli_mot_de_passe', function () use ($app){

    if(!empty($_POST) AND isset($_POST))
    {
        $email = strip_tags($_POST['email']);
        $model = new userModels();

        $mailinBase = $model->verifMail($app, $email);

        if(!empty($mailinBase))
        {
            $idutil = $mailinBase['id_util'];

            $verif_Token = $model->getToken($app, $idutil);

            $token = md5(uniqid(rand(),true));

            if(empty($verif_Token))
            {
                $model->insertToken($app, $idutil, $token);
            }
            else
            {
                $model->updateToken($app, $idutil, $token);
            }

            $contenu = "Voici le lien pour redefinir votre mdp : http://localhost/site_twig/web/redefinir_mdp/".$idutil."/".$token;

            $titre = 'Reinitialisation mot de passe';
             $message = (new \Swift_Message($titre))
            ->setFrom(array('superAdmin@moncode.com'))
            ->setTo(array($email))
            ->setBody($contenu);

            $app['mailer']->send($message);



            return $app->redirect('login');
        }
        else
        {
            return $app['twig']->render('oubli_mdp.html.twig', array('session'=>$user, 'erreur'=>'Votre adresse mail n\'existe pas! '));
        }
    }
    else
    {
        return $app['twig']->render('oubli_mdp.html.twig', array('session'=>$user, 'erreur'=>'Veuillez vérifier votre adresse mail'));
    }
})
->bind('link_generate')
;

$app->get('/redefinir_mdp/{id}/{token}', function ($id, $token) use ($app){


    $model = new userModels();
    $appel_token = $model->getMdp($app, $id, $token);
    $key = array('id'=>$id , 'token'=>$token);

    if(!empty($appel_token)) 
    {
        return $app['twig']->render('redefinir_mdp.html.twig', array('session'=>'' , 'key' => $key));
    }
    else
    {
        return $app['twig']->render('modif_profil.html.twig', array('session'=>'', 'erreur' => 'L\'ID et/ou le token ne correspondent pas !'));
    }
})
->bind('redif_mdp')
;

$app->post('/redefinir_mdp/{id}/{token}', function ($id, $token) use ($app) {

    $user = $app['session']->get('user');

    if(!empty($_POST) AND isset($_POST))
    {
 

        $id = strip_tags($id);
        $mdp1 = strip_tags($_POST['mdp1']);
        $mdp2 = strip_tags($_POST['mdp2']);

        if($mdp1 == $mdp2)
        {
            $mot_de_passe = password_hash($mdp1, PASSWORD_DEFAULT);

            $model = new userModels();
            $model->setMdp($app, $mot_de_passe,$id);
        
            $model-> deleteToken($app, $id);

            return $app->redirect($app["url_generator"]->generate('login'));
        }
        else 
        {

            return $app['twig']->render('redefinir_mdp.html.twig', array('session'=>$user, 'erreur' => 'Les mots de passe ne coïncident pas'));
        }

    }
    else 
    {
       return $app['twig']->render('redefinir_mdp.html.twig', array('session'=>$user, 'erreur' => 'Merci de vérifier vos champs'));
    }
})
->bind('mdp_redefini')
;
