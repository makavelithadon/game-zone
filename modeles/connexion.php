<?php

function connexionUser ($pseudo) {
    global $bdd;
    $req = 'SELECT * FROM membre WHERE pseudo = :pseudo';
    $userExists = $bdd->prepare($req);
    $userExists->execute(array('pseudo' => $pseudo));
    if ($userExists->rowCount() != 0) {
        return $userExists;
    }
    else {
        return false;
    }
}

?>