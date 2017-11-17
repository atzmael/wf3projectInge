<?php

session_start();

include_once('config/librairie.php');
require_once('config/inc_bdd.php');

include_once('content/header.php');

?>
<main class="container">
    <div class="row">
        <div class="section1 col-12 text-center">
            <h2>Trouves le code de tes rêves !</h2>
            <div class="recherche">
                <input type="text" placeholder="Rechercher"><button type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
            <p class="moreOptions">Options avancées</p>
            <div class="options">
                <label for="optVote">Les mieux notés</label>
                <input type="checkbox" id="DESC">
            </div>
            <div class="row">
                <div class="langages col-12 col-md-4">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_html.php">HTML</a></h3>
                        <p class="nbCode">x codes parus</p>
                        <p>derniers code ajouté : <a href="#">html tags</a></p>
                    </div>
                </div>
                <div class="langages col-12 col-md-4">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_css.php">CSS</a></h3>
                        <p class="nbCode">x codes parus</p>
                        <p>derniers code ajouté : <a href="#">css tags</a></p>
                    </div>
                </div>
                <div class="langages col-12 col-md-4">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_js_jquery.php">JAVASCRIPT</a></h3>
                        <p class="nbCode">x codes parus</p>
                        <p>derniers code ajouté : <a href="#">js tags</a></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="langages col-12 col-md-5">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_php.php">PHP</a></h3>
                        <p class="nbCode">x codes parus</p>
                        <p>derniers code ajouté : <a href="#">php tags</a></p>
                    </div>
                </div>
                <div class="langages col-12 col-md-5">
                    <div>
                        <h3><a href="<?php echo directory() ?>content/index_mysql.php">MySQL</a></h3>
                        <p class="nbCode">x codes parus</p>
                        <p>derniers code ajouté : <a href="#">MySql tags</a></p>
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
                    echo '<div class="code col-12 col-md-4">
                            <div>
                                <h3><a href="article/'.$value['id_article'].'">'.$value['title'].'</a></h3>
                                <p>Posté il y a '.$value['release_date'].' par user</p>
                            </div>
                          </div>';
                }

                ?>
            </div>
        </div>
    </div>
</main>

<?php

include_once('content/footer.php')

?>
