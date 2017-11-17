<?php
require_once('../config/inc_bdd.php');

		if(!empty($_POST['saisi']) ){

		$recherche_util = strip_tags($_POST['saisi']);

		$query = $db -> prepare("SELECT title FROM article WHERE title LIKE :toto ORDER BY title ASC");
				$query -> bindValue(':toto', '%'.$recherche_util.'%', PDO::PARAM_STR);
				$query -> execute();

				$result = $query -> fetchAll();
				
				echo json_encode($result);

	}else {
		echo json_encode('');
	}
	
?>