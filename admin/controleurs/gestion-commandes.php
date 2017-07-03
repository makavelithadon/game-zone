<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/gestion-commandes.php');

$getCommandes = getCommandes ();
if (isset($_GET['num_commande'])) {
    $getDetailsCommande = getDetailsCommande ($_GET['num_commande']);
    if (!empty($getDetailsCommande)) {
        $tabLigne = array();
        while ($ligne = $getDetailsCommande->fetch(PDO::FETCH_ASSOC)) {
            $tabLigne [] = $ligne;
        }
        if (empty($tabLigne)) {
            header('location:/game_zone/admin/gestion-commandes');
        }
    }
}

include(RACINE_SERVER . RACINE_SITE . 'admin/vues/gestion-commandes.php');

?>
