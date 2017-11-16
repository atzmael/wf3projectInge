<?php

$hash ='$2y$10$fOWHaHmjUMnzpiMMqYiVROMFw66Hz7uBf.gee4RGwv9ve2urelUda';

if (password_verify('webforce3', $hash)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

?>