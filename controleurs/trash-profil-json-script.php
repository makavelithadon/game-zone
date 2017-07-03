<?php

header('Content-type: application/json');

$host = "cl1-sql18";
$db_name = "p6005_2";
$user = "p6005_2";
$mdp = "hedsFjUrynIz";

$bdd = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) or die('Erreur de connexion à la base de données !');

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
    unset($_SESSION['utilisateur']);
}

echo json_encode($retour);

?>
