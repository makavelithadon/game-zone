<?php

header('Content-type: application/json');

require_once('./../../inc/bdd.inc.php');

$retour = array();

session_start();

function deleteComment($id_avis) {
    global $bdd;
    $req = "DELETE FROM avis WHERE id_avis = :id_avis";
    $delete = $bdd->prepare($req);
    $delete->execute(array('id_avis' => $id_avis));
}

if (isset($_POST['id_avis'])) {
    deleteComment($_POST['id_avis']);
}

echo json_encode($retour);

?>
