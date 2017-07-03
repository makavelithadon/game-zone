<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/envoi-newsletter-success.php');



include(RACINE_SERVER . RACINE_SITE . 'admin/vues/envoi-newsletter-success.php');

?>
