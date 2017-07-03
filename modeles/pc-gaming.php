<?php
function verifCat ($arg) {
    global $bdd;
    $req = "SELECT * FROM sous_categorie WHERE nom = :cat";
    $res = $bdd->prepare($req);
    $res->execute(array('cat' => $arg));
    if ($res->rowCount() != 0) {
        return true;
    } else {
        return false;
    }
}
function verifProduct ($page, $cat, $product) {
    global $bdd;
    $req = "SELECT * FROM sous_categorie, article, categorie WHERE sous_categorie.id_sous_categorie = article.id_sous_categorie AND categorie.id_categorie = article.id_categorie AND categorie.nom = :page AND sous_categorie.nom = :cat AND article.id_article = :product";
    $res = $bdd->prepare($req);
    $res->execute(array('page' => $page, 'cat' => $cat, 'product' => $product));
    if ($res->rowCount() != 0) {
            return true;
    }
    else {
        return false;
    }
}
function getCat ($arg) {
    global $bdd;
    $tabCat = array();
    $req = "SELECT DISTINCT sous_categorie.background_img, sous_categorie.nom FROM sous_categorie, article, categorie WHERE article.id_categorie = categorie.id_categorie AND sous_categorie.id_sous_categorie = article.id_sous_categorie AND categorie.nom = :page";
    $sscat = $bdd->prepare($req);
    $sscat->execute(array('page' => $arg));
    while ($data = $sscat->fetch(PDO::FETCH_ASSOC)) {
        $tabCat [] = $data;
    }
    return $tabCat;
}
function getProduct ($page, $cat, $firstEntry, $nbArticlesParPage) {
    global $bdd;
    $tabProducts = array();
    $req = "SELECT sous_categorie.nom, article.marque, article.nom,article.prix, article.id_article, article.image_1 FROM sous_categorie, article, categorie WHERE article.id_categorie = categorie.id_categorie AND sous_categorie.id_sous_categorie = article.id_sous_categorie AND categorie.nom = :page AND sous_categorie.nom = :cat AND article.quantite >= 1 LIMIT :firstEntry, :nbArticlesParPage";
    $products = $bdd->prepare($req);
    $products->bindParam(':page', $page, PDO::PARAM_STR);
    $products->bindParam(':cat', $cat, PDO::PARAM_STR);
    $products->bindParam(':firstEntry', $firstEntry, PDO::PARAM_INT);
    $products->bindParam(':nbArticlesParPage', $nbArticlesParPage, PDO::PARAM_INT);
    $products->execute();
    while ($data = $products->fetch(PDO::FETCH_ASSOC)) {
        $tabProducts [] = $data;
    }
    return $tabProducts;
}
function getProductNews ($page, $cat, $nbJours) {
    $dateFinale =  date('Y-m-d H:i:s', time() - (60*60*24* $nbJours));
    global $bdd;
    $tabProducts = array();
    $req = "SELECT sous_categorie.nom, article.marque, article.nom,article.prix, article.id_article, article.image_1 FROM sous_categorie, article, categorie WHERE article.id_categorie = categorie.id_categorie AND sous_categorie.id_sous_categorie = article.id_sous_categorie AND categorie.nom = :page AND sous_categorie.nom = :cat AND article.date > :dateFinale AND article.quantite >= 1 ORDER BY article.date DESC LIMIT 0, 8" ;
    $products = $bdd->prepare($req);
    $products->execute(array('page' => $page, 'cat' => $cat, 'dateFinale' => $dateFinale));
    while ($data = $products->fetch(PDO::FETCH_ASSOC)) {
        $tabProducts [] = $data;
    }
    return $tabProducts;
}
function countAllFromCat ($page, $cat) {
    global $bdd;
    $tabAllArtFromCat = array();
    $req = "SELECT COUNT(*) AS total FROM article, categorie, sous_categorie WHERE article.id_categorie = categorie.id_categorie AND article.id_sous_categorie = sous_categorie.id_sous_categorie AND categorie.nom = :page AND sous_categorie.nom = :cat";
    $res = $bdd->prepare($req);
    $res->execute(array('page' => $page, 'cat' => $cat));
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabAllArtFromCat[] = $data;
    }
    return $tabAllArtFromCat;
}
function getProductDetails ($page, $cat, $product) {
    global $bdd;
    $tabProductDetails = array();
    $req = "SELECT article.id_article,
    article.nom,
    article.image_1,
    article.image_2,
    article.image_3,
    article.description,
    article.description_detaillee,
    article.prix,
    article.marque,
    AVG(avis.note) AS avis_moyenne_note
    FROM article
    LEFT JOIN avis ON avis.id_article = article.id_article
    LEFT JOIN membre ON membre.id_membre = avis.id_membre
    LEFT JOIN categorie ON categorie.id_categorie = article.id_categorie
    LEFT JOIN sous_categorie ON sous_categorie.id_sous_categorie = article.id_sous_categorie
    WHERE categorie.nom = :page
    AND sous_categorie.nom = :cat
    AND article.id_article = :product
    AND article.quantite >= 1";
    $res = $bdd->prepare($req);
    $res->execute(array('page' => $page, 'cat' => $cat, 'product' => $product));
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabProductDetails [] = $data;
    }
    return $tabProductDetails;
}
function getAvisFromProduct ($product) {
    global $bdd;
    $tabAvis = array();
    $req = "SELECT avis.note,
    avis.commentaire,
    DATE_FORMAT(avis.date, '%d/%m/%Y') AS avis_date,
    avis.id_membre,
    membre.pseudo
    FROM avis,
    membre,
    article
    WHERE article.id_article = avis.id_article
    AND membre.id_membre = avis.id_membre
    AND article.id_article = :product";
    $res = $bdd->prepare($req);
    $res->execute(array('product' => $product));
    while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabAvis [] = $data;
    }
    return $tabAvis;
}
function checkAlreadyPost ($id_membre, $id_article) {
    global $bdd;
    $req = "SELECT * FROM avis WHERE id_membre = :id_membre AND id_article = :id_article";
    $res = $bdd->prepare($req);
    $res->execute(array('id_membre' => $id_membre, 'id_article' => $id_article));
    if ($res->rowCount() != 0) {
        return true;
    }
    else {
        return false;
    }
}
function sendComment ($commentaire, $note, $id_membre, $id_article) {
    global $bdd;
    $req = "INSERT INTO avis VALUES(NULL, :commentaire, :note, NOW(), :id_membre, :id_article)";
    $r = $bdd->prepare($req);
    $r->execute(array('commentaire' => $commentaire, 'note' => $note, 'id_membre' => $id_membre, 'id_article' => $id_article));
}
?>
