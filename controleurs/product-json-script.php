<?php

header('Content-type: application/json');

$retour = array();
session_start();
include_once('fonctions.inc.php');

if (isset($_POST['submit']) && $_POST['submit'] == 'AJOUTER AU PANIER') {
	$id_article = $_POST['id_article'];
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $image_1 = $_POST['image_1'];
    $prix = $_POST['prix'];
	$url = $_POST['url'];
    $quantite = 1;
    creationPanier();
    lastAddedToPanier($id_article, $nom, $marque, $image_1, $prix, $url);
    ajouterAuPanier ($id_article, $nom, $marque, $image_1, $prix, $quantite, $url);
	$retour['id_article'] = $id_article;
	$retour['nom'] = $nom;
	$retour['marque'] = $marque;
	$retour['image_1'] = $image_1;
	$retour['prix'] = $prix;
	$retour ['url'] = $url;
	$retour ['new_url'] = $_SERVER['PHP_SELF'];
	$retour['quantite'] = 1;
}

echo json_encode($retour);

?>
