<?php

	require_once "../config/inc_bdd.php";
	require_once "../config/librairie.php";

	session_start();
	if(isset($_SESSION['id']))
	{
		$query = $db -> query("SELECT DISTINCT id_lang, language_name FROM language ORDER BY id_lang ASC");

		$result = $query -> fetchall();
		?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		
	</head>
	<body>

		<form method="POST" action="retour_code.php">


			<div>
				<select name="id_lang">
				<option value="">Nom de code</option>
				<?php
					foreach ($result as $value) {
					echo "<option value='".$value['id_lang']."'>".$value['language_name']."</option>";
				
				}
			?>
		</select>
				
			</div>

			<div>
				<label for="title">Titre</label>
				<input type="text" name="title">
			</div>

			<div>
				<label for="code"></label>
				<textarea name="content" rows="6"></textarea>
			</div>
		

			<button type="submit">Soumez ton code!!!</button>


		</form>

	</body>
	</html>

	<?php
	}
	else
	{
		echo "Merci de vous connecter!";
	}

?>

