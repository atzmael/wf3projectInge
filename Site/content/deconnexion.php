<?php

	session_start();

	if(isset($_SESSION['id']))
	{
		session_unset();
		echo "<p> Vous êtes maintenant déconnecté</p>";
	}
	else
	{
		echo "<p> Vous cherchez à vous déconnecter sans vous connecter, c'est étonnant !</p>";
	}

	session_destroy();

	//ATTENTION ! changer le nom du fichier de la page d'accueil selon le vôtre !
	echo "<p><a href='accueil.php'>Retour vers l'accueil</a></p>";

?>