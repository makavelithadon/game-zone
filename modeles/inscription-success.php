<?php

function verifLastInscrit ($pseudo) {
    global $bdd;
    $req = "SELECT * FROM membre WHERE id_membre = (SELECT MAX(id_membre) FROM membre)";
    $res = $bdd->query($req);
    $data = $res->fetch(PDO::FETCH_ASSOC);
    if ($data['pseudo'] == $pseudo) {
        return true;
    }
    else {
        return false;
    }
}

 ?>
