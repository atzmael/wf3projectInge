<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');
include_once('../content/header.php');

if(isset($_SESSION['id']) AND $_SESSION['rank'] == 1)
{

        $query = $db -> query("SELECT *, language.language_name, user.pseudo FROM article INNER JOIN language ON article._id_lang = language.id_lang INNER JOIN user ON user.id_util = article._id_util");

        $result = $query -> fetchAll();

        ?>


        <main class="container">
        <div class="row">
            <div class="col-12">
                <?php

                foreach ($result as $value) 
                {
                    # code...
               
                echo    '<div class="row">
                            <div class="col-md-6">
                                <h2>'.$value['title'].'</h2>
                            </div>
                            <div class="col-md-2">
                                <h2>'.$value['pseudo'].'</h2>
                            </div>
                            <div class="col-md-2">
                                <h2>'.$value['language_name'].'</h2>
                            </div>
                            <div class="col-md-2">
                                <h2><a href="admin_modif_code.php?title='.$value["id_article"].'"><i class="fa fa-pencil"></i></a> <i class="fa fa-thumbs-down"></i></h2>
                            </div>
                        </div>';

                 }


                
                ?>
                <script>

                        
                    
                </script>
            </div>
        </div>

    </main>

    <?php

}
else
{
    header("Location: 404.php");
}



?>

   

<?php

include_once('../content/footer.php');

?>