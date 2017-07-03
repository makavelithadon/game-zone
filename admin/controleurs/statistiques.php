<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/statistiques.php');

$tabMeilleureNote = getMeilleureNote();
//var_dump($tabMeilleureNote);
$tabArticlesMieuxVendus = getArticlesMieuxVendus ();
//var_dump($tabArticlesMieuxVendus);
$tabMeilleurAcheteurQte = getMeilleurAcheteurQte ();
//var_dump($tabMeilleurAcheteurQte);
$tabMeilleurAcheteurPrix = getMeilleurAcheteurPrix ();
//var_dump($tabMeilleurAcheteurPrix);

include(RACINE_SERVER . RACINE_SITE . 'admin/vues/statistiques.php');

?>
