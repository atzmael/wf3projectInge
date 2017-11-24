<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	$champs = array('pseudo', 'email', 'titre', 'message');

	if(verif_form($_POST, $champs))
	{
		$pseudo = htmlentities($_POST['pseudo']);
		$email = htmlentities($_POST['email']);
		$titre = htmlentities($_POST['titre']);
		$message = htmlentities($_POST['message']);

		
			// appel à l'auto-chargeur
			require "../phpmailer/autoload.php";


			// création de l objet phpmailer
			$mail = new PHPMailer();


			// activer le mode debug
			//$mail->SMTPDebug=2;


			// activer SMTP

			$mail->isSMTP();


			//authentification
			$mail->Host = 'auth.smtp.1and1.fr';
			$mail->SMTPAuth = true;
			$mail->Username = 'projet@boisseau-informatique.fr';
			$mail->Password = 'Projetwf3';


			// protocole de sécurité SSL TLS
			$mail->SMTPSecure = 'tls';

			// port
			$mail->Port = 587;


			// corps du mail
			$mail-> setFrom($email);

			// envoi mail dest
			$mail -> addAddress('damien.flogny@gmail.com');

			// adresse de réponse
			$mail-> addReplyTo($email);

			// copie carbonne Option
			//$mail->addCC('adresse de copie');

			//copie carbonne invisible
			//$mail->addBCC('adresse de cci');

			//piece jointe Optionnel
			//$mail->addAttachment('chemin du fichier');

			// autoriser le html
			$mail->isHTML(true);

			// message
			$mail->Subject = $titre;
			$mail->Body = $message;
			$mail->AltBody = 'Message alternatif du mail';

			

			//envoi du mail 
			$mail->send();

			echo "Votre message a bien été envoyé";
			

			//echo "<p>Voici le lien pour redefinir votre mdp :</p>";
			//echo "<p><a href='redefinir_mdp.php?id=".$id."&token=".$token."'>LIEN</a></p>";

		}
		else
		{
			echo "<p>Vérifiez votre adresse mail</p>";
		}
	
	?>	