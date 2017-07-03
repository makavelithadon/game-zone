<?php

function getAllProducts () {
    global $bdd;
    $tabUsers = array();
    $req = "SELECT article.id_article AS 'ID',
    article.nom AS 'Nom',
    article.marque AS 'Marque',
    article.quantite AS 'Stock',
    article.prix AS 'Prix',
    article.image_1 AS 'Photo',
    categorie.nom AS 'Categorie',
    sous_categorie.nom AS 'Rayon'
    FROM article,
    sous_categorie,
    categorie
    WHERE article.id_categorie = categorie.id_categorie
    AND sous_categorie.id_sous_categorie = article.id_sous_categorie
    AND categorie.nom IN
    (SELECT DISTINCT categorie.nom
    FROM categorie)";
    $r = $bdd->query($req);
    while ($data = $r->fetch(PDO::FETCH_ASSOC)) {
        $tabUsers [] = $data;
    }
    return $tabUsers;
}
function selectDistinctCat () {
	global $bdd;
	$tabCat = array();
	$req = "SELECT DISTINCT nom FROM categorie";
	$res = $bdd->query($req);
	while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
		$tabCat [] = $data;
	}
	return $tabCat;
}
function selectDistinctSsCat () {
	global $bdd;
	$tabSsCat = array();
	$req = "SELECT DISTINCT nom FROM sous_categorie";
	$res = $bdd->query($req);
	while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
		$tabSsCat [] = $data;
	}
	return $tabSsCat;
}
function regProduct ($id_categorie, $id_sous_categorie, $nom, $marque, $description, $description_detaillee, $image_1, $image_2, $image_3, $prix, $quantite, $video) {
    global $bdd;
    $req = "INSERT into article (id_article, id_categorie, id_sous_categorie, nom, marque, description, description_detaillee, image_1, image_2, image_3, prix, quantite, date, video) VALUES (NULL, :id_categorie, :id_sous_categorie, :nom, :marque, :description, :description_detaillee, :image_1, :image_2, :image_3, :prix, :quantite, NOW(), :video)";
    $insert = $bdd->prepare($req);
    $insert->execute(array('id_categorie' => $id_categorie, 'id_sous_categorie' => $id_sous_categorie, 'nom' => $nom, 'marque' => $marque, 'description' => $description, 'description_detaillee' => $description_detaillee, 'image_1' => $image_1, 'image_2' => $image_2, 'image_3' => $image_3, 'prix' => $prix, 'quantite' => $quantite, 'video' => $video));
}
function updateProduct ($id_categorie, $id_sous_categorie, $nom, $marque, $description, $description_detaillee, $image_1, $image_2, $image_3, $prix, $quantite, $video, $id_article) {
    global $bdd;
    $req = "UPDATE article SET id_categorie = :id_categorie, id_sous_categorie = :id_sous_categorie, nom = :nom, marque = :marque, description = :description, description_detaillee = :description_detaillee, image_1 = :image_1, image_2 = :image_2, image_3 = :image_3, prix = :prix, quantite = :quantite, date = NOW(), video = :video WHERE id_article = :id_article";
    $insert = $bdd->prepare($req);
    $insert->execute(array('id_categorie' => $id_categorie, 'id_sous_categorie' => $id_sous_categorie, 'nom' => $nom, 'marque' => $marque, 'description' => $description, 'description_detaillee' => $description_detaillee, 'image_1' => $image_1, 'image_2' => $image_2, 'image_3' => $image_3, 'prix' => $prix, 'quantite' => $quantite, 'video' => $video, 'id_article' => $id_article));
}
function verifAlreadyExistsProduct ($arg) {
    global $bdd;
    $tab = array();
    $req = "SELECT * FROM article WHERE nom = :nom";
    $res = $bdd->prepare($req);
    $res->execute(array('nom' => $arg));
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tab [] =$data;
    }
    return $tab;
}
function getAllFromProduct ($arg) {
    global $bdd;
    $tab = array();
    $req = "SELECT * FROM article WHERE id_article = :id_article";
    $res = $bdd->prepare($req);
    $res->execute(array('id_article' => $arg));
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tab [] = $data;
        return $tab;
    }
}

 ?>
