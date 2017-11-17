
    <?php

    $dir = $_SERVER['SCRIPT_FILENAME'];
    $folder = preg_replace('/[a-z0-9#&?._=-]*$/i','',$dir);

    include_once($folder.'/content/header.php')

    ?>

    <main>

    </main>

    <?php include_once('content/footer.php') ?>