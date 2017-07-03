<?php

function getAllComments () {
    global $bdd;
    $tabUsers = array();
    $req = "SELECT avis.id_avis AS 'ID', avis.commentaire, avis.note, DATE_FORMAT(avis.date, 'Le %d/%m/%Y à %HH%i') AS date, membre.pseudo, article.nom AS 'Nom de l\'article', categorie.nom AS 'Catégorie', sous_categorie.nom AS 'Rayon' FROM membre, avis, article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie AND membre.id_membre = avis.id_membre AND avis.id_article = article.id_article ORDER BY date DESC";
    $r = $bdd->query($req);
    while ($data = $r->fetch(PDO::FETCH_ASSOC)) {
        $tabUsers [] = $data;
    }
    return $tabUsers;
}

 ?>
