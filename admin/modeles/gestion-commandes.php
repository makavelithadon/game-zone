<?php

function getCommandes () {
    global $bdd;
    $tabCommandes = array();
    $req = "SELECT commande.id_commande AS 'Numéro de suivi',
    DATE_FORMAT(commande.date, 'Le %d/%m/%Y à %HH%i') AS date,
    membre.pseudo AS 'Pseudo',
    commande.montant AS 'Facture'
    FROM commande,
    membre
    WHERE commande.id_membre = membre.id_membre
    ORDER BY date ASC";
    $resCommandes = $bdd->query($req);
    while ($data = $resCommandes->fetch(PDO::FETCH_ASSOC)) {
        $tabCommandes [] = $data;
    }
    return $tabCommandes;
}
function getDetailsCommande ($num_commande) {
    global $bdd;
    $tabDetailsCommande = array();
    $req = "SELECT article.id_article AS 'référence',
     categorie.nom AS 'rayon',
     article.nom,
     article.marque,
     article.image_1,
     article.prix AS 'prix_unitaire',
     details_commande.quantite
     FROM details_commande,
     commande,
     article,
     categorie
     WHERE details_commande.id_commande = commande.id_commande
     AND article.id_article = details_commande.id_article
     AND categorie.id_categorie = article.id_categorie
     AND details_commande.id_commande = :num_commande";
    $resDetailsCommande = $bdd->prepare($req);
    $resDetailsCommande->execute(array('num_commande' => $num_commande));
    return $resDetailsCommande;
}

 ?>
