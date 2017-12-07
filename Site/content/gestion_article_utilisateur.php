<?php

    session_start();

    include_once('../config/librairie.php');
    require_once('../config/inc_bdd.php');

    include_once('../content/header.php');

    if(isset($_SESSION['id']))
        {
        $query = $db -> query('SELECT article.title, article.description, article.content, article.release_date, article.vote, user.pseudo FROM article JOIN user ON article._id_util = user.id_util WHERE id_util ='.$_SESSION['id']);
        $query -> bindValue(1, $_SESSION['id'], PDO::PARAM_INT);
        $query -> execute();
        $result = $query -> fetch();

    ?>
         <main class="container">
        <div class="row">
            <div class="col-12">
                <form <form method="POST" action="modification_article_utilisateur.php">
    <?php

                echo '<h2>Titre : '.$result['title'].'</h2>';
                echo '<p>Description : '.$result['description'].'</p>';
                echo '<p><pre><code id="copyCode">'.($result['content']).'</code></pre></p>';
                echo '<p><button id="modif">Modifie ton code</button>';
                echo '<p><button id="efface">Efface ton code</button>';
                echo '<p>Auteur : '.$result['pseudo'].'</p>';
                echo '<p>Date de parution : '.$result['release_date'].'</p>';
                echo '<p>Note : '.$result['vote'].'</p>';
                
    ?>
              </form>  
            </div>
        </div>

    </main>
    <?php

        } else {

            echo " error 403 - Forbidden";
        }    
     
    ?>

    

<?php

include_once('../content/footer.php');

?>