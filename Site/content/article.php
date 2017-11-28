<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

if(isset($_GET['id'])){

    $query = $db -> prepare("SELECT article.title, article.description, article.content, article.release_date, article.vote as vote, user.pseudo FROM article JOIN user ON article._id_util = user.id_util WHERE id_article = ?");
    $query -> bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $query -> execute();

    $result = $query -> fetch();

}
else

{
    header("Location: 404.php");
}

include_once('../content/header.php');

?>

    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php

                echo '<h2>Titre : '.$result['title'].'</h2>';
                echo '<p>Description : '.$result['description'].'</p>';
                echo '<p><pre><code id="contentcopy">'.($result['content']).'</code></pre></p>';
                echo '<p><button id="copyCode">Copie ton code</button>'."  "."<select id='select'>
                                                                    <option value='0'>Ton vote</option>
                                                                    <option value='1'>&#9733;</option> 
                                                                    <option value='2'>&#9733;&#9733;</option>
                                                                    <option value='3'>&#9733;&#9733;&#9733;</option>
                                                                    <option value='4'>&#9733;&#9733;&#9733;&#9733;</option>
                                                                    <option value='5'>&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                                                </select>";


                echo '<p>Auteur : '.$result['pseudo'].'</p>';
                echo '<p>Date de parution : '.$result['release_date'].'</p>';

                echo '<p>Note : ';
                $moy = round($result['vote']);
                for($i=1;$i <= $moy;$i++){
                    echo '<i class="fa fa-star fa-2x"></i>';
                }
                $reste = 5 - $moy;
                for($i=0;$i<$reste;$i++){
                    echo '<i class="fa fa-star-o fa-2x"></i>';
                }
                echo '</p>';
                
                ?>
                <script>

                        
                    
                </script>
            </div>
        </div>

    </main>

<?php

include_once('../content/footer.php');

?>