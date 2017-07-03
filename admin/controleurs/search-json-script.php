<?php

header('Content-type: application/json');

require_once('./../../inc/bdd.inc.php');

$tab = array();

session_start();

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = strip_tags(htmlentities($_POST['search'], ENT_QUOTES));
    $req = "SELECT article.id_article, article.image_1, article.nom AS 'article_nom', categorie.nom AS 'categorie_nom', sous_categorie.nom AS 'sous_categorie_nom', article.marque FROM article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie AND (article.nom LIKE '%". $search ."%' OR categorie.nom LIKE '%". $search ."%' OR article.marque LIKE '%". $search ."%' OR categorie.nom LIKE '%". $search ."%' OR sous_categorie.nom LIKE '%". $search ."%')";
    $search = $bdd->query($req);
    while ($data = $search->fetch(PDO::FETCH_ASSOC)) {
        $tab [] = $data;
    }
}

echo json_encode($tab);

?>
