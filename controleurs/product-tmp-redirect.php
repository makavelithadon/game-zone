<?php

if (!isset($_SESSION['last_panier'])) {
	header('location:' . RACINE_SITE . 'accueil');
	exit();
}
include(dirname(__FILE__) . '/../modeles/product-tmp-redirect.php');

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
	header('location:' . $_SERVER['REQUEST_URI']);
}
include(dirname(__FILE__) . '/../vues/product-tmp-redirect.php');
?>
