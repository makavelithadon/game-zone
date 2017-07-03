<?php

function getAllFromNewsLetter () {
    global $bdd;
    $tabAllFromNewsLetter = array();
    $req = "SELECT membre.mail,
    membre.pseudo,
    membre.prenom,
    membre.nom
    FROM newsletter,
    membre
    WHERE membre.id_membre = newsletter.id_membre";
    $res = $bdd->query($req);
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabAllFromNewsLetter [] = $data;
    }
    return $tabAllFromNewsLetter;
}
