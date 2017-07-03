<?php

function pseudoExists ($pseudo) {
    global $bdd;
    $req = 'SELECT id_membre FROM membre WHERE pseudo = :pseudo';
    $q = $bdd->prepare($req);
    $q->execute(array('pseudo' => $pseudo));
    if ($q->rowCount() != 0) {
        return true;
    }
    else {
        return false;
    }
}
function mailExists ($mail) {
    global $bdd;
    $req = 'SELECT id_membre FROM membre WHERE mail = :mail';
    $q = $bdd->prepare($req);
    $q->execute(array('mail' => $mail));
    if ($q->rowCount() != 0) {
        return true;
    }
    else {
        return false;
    }
}
function inscrireMembre($pseudo, $pass, $nom, $prenom, $mail, $sexe, $ville, $cp, $adresse) {
    global $bdd;
    $inscr = $bdd->prepare("INSERT INTO membre VALUES(NULL, :pseudo, :pass, :nom, :prenom, :mail, :sexe, :ville, :cp, :adresse, 0)");
    $inscr->execute(array('pseudo' => $pseudo, 'pass' => $pass, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'sexe' => $sexe, 'ville' => $ville, 'cp' => $cp, 'adresse' => $adresse));
}

 ?>
