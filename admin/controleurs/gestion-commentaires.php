<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/gestion-commentaires.php');

$getAllComments = getAllComments();

include(RACINE_SERVER . RACINE_SITE . 'admin/vues/gestion-commentaires.php');

?>
