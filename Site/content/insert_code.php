<?php

    session_start();

    include_once('../config/librairie.php');
    require_once('../config/inc_bdd.php');

    include_once('../content/header.php');

	if(isset($_SESSION['id']))
	{
		$query = $db -> query("SELECT DISTINCT id_lang, language_name FROM language ORDER BY id_lang ASC");

		$result = $query -> fetchall();
		?>

  

    <main class="container">
    	<form>


			<div>
				<select id="id_lang" name="id_lang">
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
				<input type="text" id="title" name="title">
			</div>

			<div>
				<label for="description">description</label>
				<input type="text" id="description" name="description">
			</div>

			<label for="code">Code</label>

			<div id="all_content">

				<textarea name="content1" id="content1" rows="6"></textarea>
			</div>
			

			<button id="ajout_content">Ajouter une zone de contenu</button>
			<input type="hidden" value="1" id="nb_ajout_content" name="nb_ajout_content">

			<button id="insert_code" type="submit">Soumets ton code!!!</button>

			<div id="succes">
			</div>


		</form>

</main>

<?php
include_once('../content/footer.php');
	}
	else
	{
		echo "Merci de vous connecter!";
	}

?>