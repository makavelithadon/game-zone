<?php

function search ($arg) {
    global $bdd;
    $tab = array();
    $req = "SELECT article.id_article, article.image_1, article.nom AS 'article_nom', categorie.nom AS 'categorie_nom', sous_categorie.nom AS 'sous_categorie_nom', article.marque, article.prix FROM article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie AND (article.nom LIKE '%". $arg ."%' OR categorie.nom LIKE '%". $arg ."%' OR article.marque LIKE '%". $arg ."%' OR categorie.nom LIKE '%". $arg ."%' OR sous_categorie.nom LIKE '%". $arg ."%') ORDER BY article.nom ASC";
    $search = $bdd->prepare($req);
    $search->execute(array('arg' => $arg));
    while ($data = $search->fetch(PDO::FETCH_ASSOC)) {
        $tab [] = $data;
    }
    return $tab;
}
function getAllProducts () {
    global $bdd;
    $tab = array();
    $req = "SELECT article.id_article, article.image_1, article.nom AS 'article_nom', categorie.nom AS 'categorie_nom', sous_categorie.nom AS 'sous_categorie_nom', article.marque, article.prix FROM article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie ORDER BY article.date DESC";
    $search = $bdd->query($req);
    while ($data = $search->fetch(PDO::FETCH_ASSOC)) {
        $tab [] = $data;
    }
    return $tab;
}
