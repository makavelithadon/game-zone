<?php
//  FONCTIONS DU PANIER  //

function creationPanier () {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['id_article'] = array();
        $_SESSION['panier']['nom'] = array();
        $_SESSION['panier']['marque'] = array();
        $_SESSION['panier']['image_1'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['url'] = array();
    }
    if (!isset($_SESSION['last_panier'])) {
        $_SESSION['last_panier'] = array();
        $_SESSION['last_panier']['id_article'] = array();
        $_SESSION['last_panier']['nom'] = array();
        $_SESSION['last_panier']['marque'] = array();
        $_SESSION['last_panier']['image_1'] = array();
        $_SESSION['last_panier']['prix'] = array();
        $_SESSION['last_panier']['url'] = array();
    }
}
function lastAddedToPanier ($id_article, $nom, $marque, $image_1, $prix, $url) {
    $_SESSION['last_panier']['id_article'] = $id_article;
    $_SESSION['last_panier']['nom'] = $nom;
    $_SESSION['last_panier']['marque'] = $marque;
    $_SESSION['last_panier']['image_1'] = $image_1;
    $_SESSION['last_panier']['prix'] = $prix;
    $_SESSION['last_panier']['url'] = $url;
}
function ajouterAuPanier ($id_article, $nom, $marque, $image_1, $prix, $quantite, $url) {
    $cle_existe = array_search($id_article, $_SESSION['panier']['id_article']);
    if ($cle_existe !== FALSE) {
        $_SESSION['panier']['quantite'][$cle_existe] += 1;
    }
    else {
        $_SESSION['panier']['id_article'][] = $id_article;
        $_SESSION['panier']['nom'][] = $nom;
        $_SESSION['panier']['marque'][] = $marque;
        $_SESSION['panier']['image_1'][] = $image_1;
        $_SESSION['panier']['prix'][] = $prix;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['url'][] = $url;
    }
}
function retirerArticlePanier ($arg) {
	$pos = array_search($arg, $_SESSION['panier'] ['id_article']);
	if ($pos !== FALSE) {
		foreach ($_SESSION['panier'] AS $key => $val) {
			array_splice($_SESSION['panier'][$key], $pos, 1);
		}
	}
}
//  FIN DE FONCTIONS DU PANIER  //

// FONCTIONS STRING //

function cut ($str, $len, $sep) {
	if (mb_strlen($str, "UTF-8") <= $len) {
		return $str;
	}
	else {
		$str = substr($str, 0, $len);
		$space = strrchr($str, ' ');
		$pos = strpos($str, $space);
		$str = substr($str, 0, $pos);
		return $str . $sep;
	}
}
 ?>
