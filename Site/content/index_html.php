<?php

	session_start();

	include_once('../config/librairie.php');
	require_once('../config/inc_bdd.php');

	include_once('../content/header.php');

	$query = $db -> query("SELECT article.id_article, article.title, article.description, article.release_date, article.vote, user.pseudo FROM article JOIN user ON article._id_util = user.id_util WHERE article._id_lang = 1");
	$query -> execute();

	$result = $query -> fetchAll();


	?>

	<main class="container">

		<div class="row">

		<?php 

		foreach($result as $value) {
                    echo '<div class="code col-md-4">
                            <div>
                                <h3><a href="'.directory() .'content/article.php?id='.$value['id_article'].'">'.$value['title'].'</a></h3>
                                <p>Posté il y a '.$value['release_date'].' par '.$value['pseudo'].'</p>
                            </div>
                          </div>'; 
        }

        ?>
        </div>

	</main>

	<?php

	include_once('../content/footer.php');

	?>
