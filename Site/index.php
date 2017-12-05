<?php

session_start();

include_once('config/librairie.php');
require_once('config/inc_bdd.php');

$html = $db ->query("SELECT count(article.id_article) as codes_parus, id_article, article.title, language_name from language join article on article._id_lang = language.id_lang where id_lang=1 order by article.id_article desc limit 1");

$css = $db -> query("SELECT count(article.id_article) as codes_parus, id_article, article.title, language_name from language join article on article._id_lang = language.id_lang where id_lang=2 order by article.id_article desc limit 1");

$js = $db -> query("SELECT count(article.id_article) as codes_parus, id_article, article.title, language_name from language join article on article._id_lang = language.id_lang where id_lang=3 order by article.id_article desc limit 1");

$php = $db -> query("SELECT count(article.id_article) as codes_parus, id_article, article.title, language_name from language join article on article._id_lang = language.id_lang where id_lang=4 order by article.id_article desc limit 1");

$mysql = $db -> query("SELECT count(article.id_article) as codes_parus, id_article, article.title, language_name from language join article on article._id_lang = language.id_lang where id_lang=5 order by article.id_article desc limit 1");

$html = $html->fetch();
$css = $css->fetch();
$js = $js->fetch();
$php = $php->fetch();
$mysql = $mysql->fetch();

include_once('content/header.php');

?>
<div class="recherche text-center">
    <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="input-group searchField">
        <input type="text" class="form-control" placeholder="Rechercher" id="search" aria-label="recherche">
        <span class="input-group-addon"><i class="fa fa-arrow-right fa-2x"></i></span>
    </div>
    <div id="options">
        <label for="optVote">Les mieux notés<input type="checkbox" id="optVote" value="DESC"></label>
        <select name="optDate" id="optDate">
            <option value="DESC">Du plus récent</option>
            <option value="ASC">Du moins récent</option>
        </select>
    </div>
    <div id="response"></div>
</div>
<main class="container">
    <div class="row">
        <div class="section1 col-12 text-center">
            <h2>Trouve le code de tes rêves !</h2>
            <button id="btnSearch">Rechercher</button>
            <div class="row justify-content-center">
                <div class="langages col-md-4 mh-100">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_html.php">HTML</a></h3>
                        <p class="nbCode"><?php echo $html['codes_parus'] ?> codes parus</p>
                        <?php

                        echo '<p>derniers code ajouté : <a href="'.directory().'content/article.php?id='.$html['id_article'].'">'. $html['title'] .'</a></p>';

                        ?>
                    </div>
                </div>
                <div class="langages col-md-4 mh-100">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_css.php">CSS</a></h3>
                        <p class="nbCode"><?php echo $css['codes_parus'] ?> codes parus</p>
                        <?php

                        echo '<p>derniers code ajouté : <a href="'.directory().'content/article.php?id='.$css['id_article'].'">'. $css['title'] .'</a></p>';

                        ?>
                    </div>
                </div>
                <div class="langages col-md-4 mh-100">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_js.php">JAVASCRIPT</a></h3>
                        <p class="nbCode"><?php echo $js['codes_parus'] ?> codes parus</p>
                        <?php

                        echo '<p>derniers code ajouté : <a href="'.directory().'content/article.php?id='.$js['id_article'].'">'. $js['title'] .'</a></p>';

                        ?>
                    </div>
                </div>
                <div class="langages col-md-4 mh-100">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_php.php">PHP</a></h3>
                        <p class="nbCode"><?php echo $php['codes_parus'] ?> codes parus</p>
                        <?php

                        echo '<p>derniers code ajouté : <a href="'.directory().'content/article.php?id='.$php['id_article'].'">'. $php['title'] .'</a></p>';

                        ?>
                    </div>
                </div>
                <div class="langages col-md-4 mh-100">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_mysql.php">MySQL</a></h3>
                        <p class="nbCode"><?php echo $mysql['codes_parus'] ?> codes parus</p>
                        <?php

                        echo '<p>derniers code ajouté : <a href="'.directory().'content/article.php?id='.$mysql['id_article'].'">'. $mysql['title'] .'</a></p>';

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section2 col-12 text-center">
            <h2>Tous nos codes</h2>
            <div class="row">
                <?php

                include_once('content/affiche_code.php');

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
            <a href="<?php echo directory() ?>content/allcode.php" class="linkBtn">voir plus</a>
        </div>
    </div>
</main>

<?php

include_once('content/footer.php')

?>
