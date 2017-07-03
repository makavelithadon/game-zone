<?php

header('Content-type: application/json');

require_once('./../../inc/bdd.inc.php');

$retour = array();

session_start();

function deleteUser($id_membre) {
    global $bdd;
    $req = "DELETE FROM membre WHERE id_membre = :id_membre";
    $delete = $bdd->prepare($req);
    $delete->execute(array('id_membre' => $id_membre));
}

if (isset($_POST['id_membre'])) {
    deleteUser($_POST['id_membre']);
}

echo json_encode($retour);

?>
