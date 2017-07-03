<?php

header('Content-type: application/json');

require_once('./../../inc/bdd.inc.php');

$retour = array();

session_start();

function deleteProduct($id_article) {
    global $bdd;
    $req = "DELETE FROM article WHERE id_article = :id_article";
    $delete = $bdd->prepare($req);
    $delete->execute(array('id_article' => $id_article));
}

if (isset($_POST['id_article'])) {
    deleteProduct($_POST['id_article']);
}

echo json_encode($retour);

?>
