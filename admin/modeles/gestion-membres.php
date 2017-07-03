<?php

function getAllUsers () {
    global $bdd;
    $tabUsers = array();
    $req = "SELECT id_membre AS 'ID', pseudo, nom, prenom, mail AS 'E-mail', sexe, ville, statut FROM membre";
    $r = $bdd->query($req);
    while ($data = $r->fetch(PDO::FETCH_ASSOC)) {
        $tabUsers [] = $data;
    }
    return $tabUsers;
}

 ?>
