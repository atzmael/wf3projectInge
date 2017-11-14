<?php

	//acceuil.php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
</head>
<body>

	<?php 
		if(isset($_SESSION['id']))
		{
	?>

		<p><a href="deconnexion.php">DECONNEXION</a></p>

	<?php
		}
		else
		{
	?>
		<p><a href="connexion.php">CONNEXION</a></p>
		<p><a href="inscription.php">INSCRIPTION</a></p>

	<?php
		}
	?>

</body>
</html>