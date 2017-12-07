<?php

require_once('../config/inc_bdd.php');
require_once('../config/librairie.php');

include_once('../content/header.php');


$champs = array('email', 'mot_de_passe');

if(verif_form($_POST, $champs))
{
    $email = htmlentities($_POST['email']);
    $mot_de_passe = htmlentities($_POST['mot_de_passe']);



    //verifier si email existe en base et preparation du mot de passe

    $query = $db -> prepare("SELECT id_util, pseudo, firstname, lastname, password, rank FROM user WHERE email = :email");
    $query -> bindValue(':email', $email, PDO::PARAM_STR);
    $query -> execute();

    $result = $query -> fetch();

    if(!empty($result))
    {
        $mdp_base = $result['password']; //mot_de_passe

        //verifier mot de passe

        if(password_verify($mot_de_passe, $mdp_base))
        {
            session_start();
            $_SESSION['id'] = $result['id_util'];
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['nom'] = $result['firstname'];
            $_SESSION['prenom'] = $result['lastname'];
            $_SESSION['rank'] = $result['rank'];
            header("Location: ../index.php");
        }
        else
        {
            echo "<p>Le mot de passe n'est pas valide!</p>";
        }
    }
    else
    {
        echo "Votre adresse email n'existe pas!";
    }
}
else
{
    echo "<p>Echec d'authentification</p>";
}

include_once('../content/footer.php');
?>