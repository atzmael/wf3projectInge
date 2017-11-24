<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	$champs = array('email');

	if(verif_form($_POST, $champs))
	{
		$email = htmlentities($_POST['email']);

		//verifier si email existe en base et preparation du mot de passe

		$query = $db -> prepare("SELECT id_util FROM user WHERE email = :email");
		$query -> bindValue(':email', $email, PDO::PARAM_STR);
		$query -> execute();

		$result = $query -> fetch();

		if(!empty($result)) //si les mots de passe sont identiques alors
		{
			$id = $result['id_util'];

			$query = $db -> prepare('SELECT * FROM token WHERE id = :id');
			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> execute();
			$result = $query -> fetch();

			$token = md5(uniqid(rand(),true));

			if(empty($result))
			{				

				$query = $db -> prepare("INSERT INTO token VALUES (:id, :token)");
				
			}
			else
			{

				$query = $db -> prepare("UPDATE token SET token_key = :token WHERE id = :id");
			
			}

			$query -> bindValue(':id', $id, PDO::PARAM_INT);
			$query -> bindValue(':token', $token, PDO::PARAM_STR);
			$query -> execute();

			

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
			$mail-> setFrom('projet@boisseau-informatique.fr');

			// envoi mail dest
			$mail -> addAddress($email);

			// adresse de réponse
			$mail-> addReplyTo('damien.flogny@gmail.com');

			// copie carbonne Option
			//$mail->addCC('adresse de copie');

			//copie carbonne invisible
			//$mail->addBCC('adresse de cci');

			//piece jointe Optionnel
			//$mail->addAttachment('chemin du fichier');

			// autoriser le html
			$mail->isHTML(true);

			// message
			$mail->Subject = 'Modification mot de pass';
			$mail->Body = "<p>Voici le lien pour redefinir votre mdp :</p>"."<p><a href='localhost/wf3projectInge/Site/content/redefinir_mdp.php?id=".$id."&token=".$token."'>LIEN</a></p>";
			$mail->AltBody = 'Message alternatif du mail';

			

			//envoi du mail 
			$mail->send();

			echo "Un lien de reinitialisation vous a été envoyé sur votre adresse ".$email;

			//echo "<p>Voici le lien pour redefinir votre mdp :</p>";
			//echo "<p><a href='redefinir_mdp.php?id=".$id."&token=".$token."'>LIEN</a></p>";


		}
		else
		{
			echo "<p>l'adresse email n'existe pas!</p>";
		}

	}
	else
	{
		echo "<p> Vérifier votre adresse mail</p>";
	}

?>