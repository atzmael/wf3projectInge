<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

    <main class="container faq">

        <h2 class="text-center">Notre F.A.Q comporte les principales questions que vous pouvez vous poser sur l'utilisation de notre site...</h2>

        <div class="faq-item faq1">
            <p><span>Qs 1. </span>Je viens de m'inscrire sur le site, comment publier un code ?</p>
            <p>Il suffit de cliquer sur le lien vers ton profil dans le menu en haut, puis de cliquer sur ajouter un code. Tu peux ajouter autant de zone de contenu que tu as besoin. Une fois tout cela fait, tu peux cliquer sur "Soumet ton code" et il sera ajouté à la liste des codes en attente de publication.</p>
        </div>

        <div class="faq-item faq2">
            <p><span>Qs 2. </span>Une fois que j'ai ajouté mon code, comment est-il publié ?</p>
            <p>Il suffit d'attendre qu'un administrateur ou modérateur accepte ton code et il sera automatiquement publié.</p>
        </div>



    </main>

<?php

include_once('../content/footer.php');

?>