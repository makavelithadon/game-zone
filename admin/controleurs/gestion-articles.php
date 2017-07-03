<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/gestion-articles.php');

$msg = '';
$msg_categorie = '';
$msg_titre = '';
$msg_description = '';
$msg_image_1 = '';
$msg_image_2 = '';
$msg_image_3 = '';
$msg_quantite = '';
$msg_rayon = '';
$msg_marque = '';
$msg_description_detaillee = '';
$msg_prix = '';
$msg_video = '';

if (isset($_GET['action']) && $_GET['action'] == 'modifier') {
    if (isset($_GET['product'])) {
        $get_product = substr($_GET['product'], (strpos($_GET['product'], '-') + 1), mb_strlen($_GET['product'], 'UTF-8'));
        $allFromProduct = getAllFromProduct ($get_product);
        if (empty($allFromProduct)) {
            header('location:/game_zone/admin/gestion-articles');
        }
    }
    else {
        header('location:/game_zone/admin/gestion-articles');
    }
}

if (isset($_POST['submit']) && ($_POST['submit'] == 'Ajouter l\'article' || $_POST['submit'] == 'Modifier l\'article')) {
    if (!empty($_POST['id_article'])) {
        $id_article = $_POST['id_article'];
    }
    if ($_POST['categorie']) {
        $categorie = strip_tags(htmlentities($_POST['categorie'], ENT_QUOTES));
        $numCategorie = strpos($categorie, '-');
        $numCategorie = substr($categorie, 0, $numCategorie); // Numéro de la catégorie, servira en BDD

        $nomCategorie = strpos($categorie, '-');
        $nomCategorie = substr($categorie, ($nomCategorie + 1), mb_strlen($categorie, 'UTF-8')); // Nom de la catégorie
    }
    else {
        $msg_categorie = 'Vous devez sélectionner une catégorie';
        $msg .= 'Vous devez sélectionner une catégorie';
    }
    if ($_POST['rayon']) {
        $rayon = strip_tags(htmlentities($_POST['rayon'], ENT_QUOTES));

        $numRayon = strpos($rayon, '-');
        $numRayon = substr($rayon, 0, $numRayon); // Numéro du rayon (sous_categorie), servira en BDD

        $nomRayon = strpos($rayon, '-');
        $nomRayon = substr($rayon, ($nomRayon + 1), mb_strlen($rayon, 'UTF-8')); // Nom du rayon (sous_categorie) servira pour le nom de la photo et de l'article
    }
    else {
        $msg_rayon = 'Vous devez sélectionner un rayon';
        $msg .= 'Vous devez sélectionner un rayon';
    }
    if ($_POST['titre']) {
		$tabreplace1 = array('\'', '\"', ')', '(', '_');
        $titre = str_replace($tabreplace1, '', $_POST['titre']);
		$titre = strip_tags(htmlentities($_POST['titre'], ENT_QUOTES));
        $tabReplace = array(' ', ',', '\'', '\"', ')', '(', '_', '\\', '/', '*', '.');
        $cutTitre = strtolower(str_replace($tabReplace, '-', $titre));
    }
    else {
        $msg_titre = 'Vous devez renseigner un titre';
        $msg .= 'Vous devez renseigner un titre';
    }
    if ($_POST['marque']) {
        $marque = strip_tags(htmlentities($_POST['marque'], ENT_QUOTES));
    }
    else {
        $msg_marque = 'Vous devez renseigner une marque';
        $msg .= 'Vous devez renseigner une marque';
    }
    if ($_POST['description']) {
        $description = strip_tags(htmlentities($_POST['description'], ENT_QUOTES));
    }
    else {
        $msg_description = 'Vous devez renseigner une brève description de l\'article';
        $msg .= 'Vous devez renseigner une brève description de l\'article';
    }
    if (!empty($_FILES['image_1']['name'])) {
        if (!verifExt ($_FILES['image_1']['name'])) {
            $msg_image_1 = 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
            $msg .= 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
        }
        else {
            if ($_FILES['image_1']['error'] == 0) {
                $ext = substr($_FILES['image_1']['name'], strrpos($_FILES['image_1']['name'], '.'), mb_strlen($_FILES['image_1']['name']));
                $tmp_name = $_FILES["image_1"]["tmp_name"];
                $name = $cutTitre . strtolower(str_replace(' ', '-', $nomRayon)) . $ext;
                move_uploaded_file($tmp_name, RACINE_SERVER . RACINE_SITE . 'img/' . $name);
                $image_1 = RACINE_SITE . 'img/' . $name;
            }
            else {
                $msg_image_1 = 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
                $msg .= 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
            }
        }
    }
    else {
        if (isset($get_product)) {
            $image_1 = $allFromProduct[0]['image_1'];
        }
        else {
            $msg_image_1 = 'Vous devez uploader une image principale pour cet article';
            $msg .= 'Vous devez uploader une image principale pour cet article';
        }
    }
    if ($_POST['description_detaillee']) {
        $description_detaillee = strip_tags(htmlentities($_POST['description_detaillee'], ENT_QUOTES));
    }
    else {
        $msg_description_detaillee = 'Vous devez renseigner une description détaillée de l\'article';
        $msg .= 'Vous devez renseigner une description détaillée de l\'article';
    }
    if ($_POST['prix']) {
        if (!regExpPrix ($_POST['prix'])) {
            $msg_prix = 'Le prix renseigné n\'est pas correct';
            $msg .= 'Le prix renseigné n\'est pas correct';
        }
        else {
            $prix = strip_tags(htmlentities($_POST['prix'], ENT_QUOTES));
        }
    }
    else {
        $msg_prix = 'Vous devez renseigner un prix pour cet article';
        $msg .= 'Vous devez renseigner un prix pour cet article';
    }
    if ($_POST['quantite']) {
        $regExpQte = preg_match('#^[0-9]+$#', $_POST['quantite']);
        if (!$regExpQte) {
            $msg_quantite = 'La quantité renseignée n\'est pas correcte';
            $msg .= 'La quantité renseignée n\'est pas correcte';
        }
        else {
            $quantite = strip_tags(htmlentities($_POST['quantite'], ENT_QUOTES));
        }
    }
    else {
        $msg_quantite = 'Vous devez renseigner une quantité pour cet article';
        $msg .= 'Vous devez renseigner une quantité pour cet article';
    }
    if (!empty($_FILES['image_2']['name'])) {
        if (!verifExt ($_FILES['image_2']['name'])) {
            $msg_image_2 = 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
            $msg .= 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
        }
        else {
            if ($_FILES['image_2']['error'] == 0) {
                $ext = substr($_FILES['image_2']['name'], strrpos($_FILES['image_2']['name'], '.'), mb_strlen($_FILES['image_2']['name']));
                $tmp_name = $_FILES["image_2"]["tmp_name"];
                $name = $cutTitre . strtolower(str_replace(' ', '-', $nomRayon)) . 'image-2' . $ext;
                move_uploaded_file($tmp_name, RACINE_SERVER . RACINE_SITE . 'img/' . $name);
                $image_2= RACINE_SITE . 'img/' . $name;
            }
            else {
                $msg_image_2 = 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
                $msg .= 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
            }
        }
    }
    else {
        if (isset($get_product) && $allFromProduct[0]['image_2'] != NULL) {
            $image_2 = $allFromProduct[0]['image_2'];
        }
        else {
            $image_2 = NULL;
        }
    }
    if (!empty($_FILES['image_3']['name'])) {
        if (!verifExt ($_FILES['image_3']['name'])) {
            $msg_image_3 = 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
            $msg .= 'Seules les extensions .png, .jpg, .jpeg et .gif sont acceptées';
        }
        else {
            if ($_FILES['image_3']['error'] == 0) {
                $ext = substr($_FILES['image_3']['name'], strrpos($_FILES['image_3']['name'], '.'), mb_strlen($_FILES['image_3']['name']));
                $tmp_name = $_FILES["image_3"]["tmp_name"];
                $name = $cutTitre . strtolower(str_replace(' ', '-', $nomRayon)) . 'image-3' . $ext;
                move_uploaded_file($tmp_name, RACINE_SERVER . RACINE_SITE . 'img/' . $name);
                $image_3 = RACINE_SITE . 'img/' . $name;
            }
            else {
                $msg_image_3 = 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
                $msg .= 'Une erreur s\'est produite au moment de l\'upload de l\'image, veuillez réessayer';
            }
        }
    }
    else {
        if (isset($get_product) && $allFromProduct[0]['image_3'] != NULL) {
            $image_3 = $allFromProduct[0]['image_3'];
        }
        else {
            $image_3 = NULL;
        }
    }
    if (!empty($_FILES['video']['name'])) {

    }
    else {
        $video = NULL;
    }
    if (isset($titre) && isset($nomRayon)) {
        $tabAlreadyExists = verifAlreadyExistsProduct ($titre . $nomRayon);
        if (!empty($tabAlreadyExists)) {
            $msg_titre = 'Un article portant ce nom est déja enregistré dans la base de données';
        }
    }
    if (empty($msg)) {
        if ($_GET['action'] == 'ajouter') {
            regProduct ($numCategorie, $numRayon, $titre . $nomRayon, $marque, $description, $description_detaillee, $image_1, $image_2, $image_3, $prix, $quantite, $video);
        }
        else {
            updateProduct ($numCategorie, $numRayon, $titre, $marque, $description, $description_detaillee, $image_1, $image_2, $image_3, $prix, $quantite, $video, $id_article);
        }
    header('location:/game_zone/admin/gestion-articles/afficher');
    }
}

$getAllProducts = getAllProducts();
$tabCat = selectDistinctCat ();
$tabSsCat = selectDistinctSsCat ();

include(RACINE_SERVER . RACINE_SITE . 'admin/vues/gestion-articles.php');

?>
