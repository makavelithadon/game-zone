<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include RACINE_SERVER . RACINE_SITE . 'admin/modeles/gestion-membres.php';

$getAllUsers = getAllUsers();

include RACINE_SERVER . RACINE_SITE . 'admin/vues/gestion-membres.php';

?>