<?php

function getInscritsNewsletter ($id_membre) {
    global $bdd;
    $tabGetNewsletter = array();
    $req = "SELECT * FROM newsletter WHERE id_membre = :id_membre";
    $get = $bdd->prepare($req);
    $get->execute(array('id_membre' => $id_membre));
    while ($data = $get->fetch(PDO::FETCH_ASSOC)) {
        $tabGetNewsletter [] = $data;
    }
    return $tabGetNewsletter;
}

?>
