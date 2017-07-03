<?php

function getCommandes ($id_membre) {
    global $bdd;
    $req = "SELECT id_commande AS 'Numéro de suivi',
    DATE_FORMAT(date, '%d/%m/%Y') AS date,
    montant AS 'Facture'
    FROM commande
    WHERE id_membre = :id_membre
    ORDER BY date ASC";
    $resCommandes = $bdd->prepare($req);
    $resCommandes->execute(array('id_membre' => $id_membre));
    return $resCommandes;
}
function getDetailsCommande ($num_commande, $id_membre) {
    global $bdd;
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
     AND details_commande.id_commande = :num_commande
     AND commande.id_membre = :id_membre";
    $resDetailsCommande = $bdd->prepare($req);
    $resDetailsCommande->execute(array('num_commande' => $num_commande, 'id_membre' => $id_membre));
    return $resDetailsCommande;
}
function pseudoExists ($pseudo) {
    global $bdd;
    $req = 'SELECT * FROM membre WHERE pseudo = :pseudo';
    $q = $bdd->prepare($req);
    $q->execute(array('pseudo' => $pseudo));
    if ($q->rowCount() != 0) {
        $res = $q->fetch(PDO::FETCH_ASSOC);
        return $res['id_membre'];
    }
    else {
        return false;
    }
}
function mailExists ($mail) {
    global $bdd;
    $req = 'SELECT * FROM membre WHERE mail = :mail';
    $q = $bdd->prepare($req);
    $q->execute(array('mail' => $mail));
    if ($q->rowCount() != 0) {
        $res = $q->fetch(PDO::FETCH_ASSOC);
        return $res['id_membre'];
    }
    else {
        return false;
    }
}
function updateMembre ($id_membre, $tabUpdate) {
    global $bdd;
    $tabLength = count($tabUpdate);
    $req = "UPDATE membre SET";
    $i = 0;
    foreach($tabUpdate AS $k => $v)
        {
            if($i == $tabLength - 1)
            {
                $req .= " $k = '$v'";
            }
            else
            {
                $req .= " $k = '$v',";
            }
            $i++;
        }
    $req .= " WHERE id_membre = :id_membre";
    echo $req;
    $update = $bdd->prepare($req);
    $update->execute(array('id_membre' => $id_membre));
}
function setNewSession ($id_membre) {
    global $bdd;
    $req = "SELECT * FROM membre WHERE id_membre = :id_membre";
    $get = $bdd->prepare($req);
    $get->execute(array('id_membre' => $id_membre));
    $ligne = $get->fetch(PDO::FETCH_ASSOC);
    foreach ($ligne AS $k => $v) {
        if ($k != 'mdp') {
            $_SESSION['utilisateur'][$k] = $v;
        }
    }
}

?>
