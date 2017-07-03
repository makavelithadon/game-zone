<?php

include(dirname(__FILE__) . '/../modeles/inscription-success.php');

if (isset($_SESSION['last_inscrit']) && verifLastInscrit ($_SESSION['last_inscrit'])) {
    include(dirname(__FILE__) . '/../vues/inscription-success.php');
}
else {
    header('location:/game_zone/accueil');
}

?>
