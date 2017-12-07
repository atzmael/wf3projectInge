<?php

session_start();

include_once('../config/librairie.php');
require_once('../config/inc_bdd.php');

include_once('../content/header.php');

?>

<main class="container rechercher">
    <div class="text-center searchField">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher" id="search2" aria-label="recherche">
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
</main>

<?php

include_once('../content/footer.php');

?>
