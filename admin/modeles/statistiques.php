<?php

function getMeilleureNote () {
    global $bdd;
    $tabMeilleureNote = array();
    $req = "SELECT ROUND(AVG(avis.note)) AS note,
		article.id_article,
        article.nom,
        article.marque,
        article.image_1,
		categorie.nom AS 'Catégorie',
        sous_categorie.nom AS 'Rayon'
		FROM article,
		avis,
        categorie,
        sous_categorie
		WHERE article.id_categorie = categorie.id_categorie
        AND article.id_sous_categorie = sous_categorie.id_sous_categorie
        AND avis.id_article = article.id_article
		GROUP BY article.nom
		ORDER BY note DESC
		LIMIT 0, 5";
        $res = $bdd->query($req);
        while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
            $tabMeilleureNote [] = $data;
        }
        return $tabMeilleureNote;
}
function getArticlesMieuxVendus () {
    global $bdd;
    $tabArticlesMieuxVendus = array();
    $req = "SELECT COUNT(details_commande.id_article) AS 'Nombre de ventes',
    		article.nom,
    		article.marque,
            article.image_1,
    		categorie.nom AS 'Catégorie',
            sous_categorie.nom AS 'Rayon'
    		FROM details_commande,
    		article,
    		categorie,
            sous_categorie
    		WHERE article.id_categorie = categorie.id_categorie
            AND article.id_sous_categorie = sous_categorie.id_sous_categorie
    		AND details_commande.id_article = article.id_article
    		GROUP BY article.id_article
    		ORDER BY COUNT(details_commande.id_article) DESC
    		LIMIT 0, 5";
            $res = $bdd->query($req);
            while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
                $tabArticlesMieuxVendus [] = $data;
            }
            return $tabArticlesMieuxVendus;
}
function getMeilleurAcheteurQte () {
    global $bdd;
    $tabMeilleurAcheteurQte = array();
    $req = "SELECT COUNT(details_commande.id_article) AS 'Nombre d\'achats',
		commande.id_membre,
		membre.pseudo
		FROM commande,
		details_commande,
		membre
		WHERE details_commande.id_commande = commande.id_commande
		AND membre.id_membre = commande.id_membre
		GROUP BY membre.pseudo
		ORDER BY COUNT(details_commande.id_article) DESC
		LIMIT 0, 5";
        $res = $bdd->query($req);
        while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
            $tabMeilleurAcheteurQte [] = $data;
        }
        return $tabMeilleurAcheteurQte;
}
function getMeilleurAcheteurPrix () {
    global $bdd;
    $tabMeilleurAcheteurPrix = array();
    $req = "SELECT SUM(commande.montant) AS 'Montant des achats',
		commande.id_membre,
		membre.pseudo
		FROM commande,
		membre
		WHERE commande.id_membre = membre.id_membre
		GROUP BY id_membre
		ORDER BY SUM(commande.montant) DESC
        LIMIT 0, 5";
        $res = $bdd->query($req);
        while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
            $tabMeilleurAcheteurPrix [] = $data;
        }
        return $tabMeilleurAcheteurPrix;
}
