<?php
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
function newsByCat ($cat) {
    global $bdd;
    $news = array();
    $req = 'SELECT article.id_article, article.marque, article.nom, article.image_1, article.description, article.prix, categorie.nom AS "categorie", sous_categorie.nom AS "sous_categorie" FROM article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie AND categorie.nom = :cat AND article.quantite >= 1 ORDER BY article.date DESC LIMIT 0, 4';
    $results = $bdd->prepare($req);
	$results->execute(array('cat' => $cat));
    while ($data = $results->fetch(PDO::FETCH_ASSOC)) {
        $news [] = $data;
    }
    return $news;
}

 ?>
