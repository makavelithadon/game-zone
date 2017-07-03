<?php
include(dirname(__FILE__) . '/../modeles/pc-gaming.php');

$msg = '';
$msg_commentaire = '';
$msg_note = '';

if (isset($_POST['submit']) && $_POST['submit'] == 'Valider') {
    if (!empty($_POST['commentaire'])) {
        $commentaire = strip_tags(htmlentities($_POST['commentaire'], ENT_QUOTES));
    }
    else {
        $msg_commentaire = 'Vous devez renseigner un commentaire';
        $msg .= 'Vous devez renseigner un commentaire';
    }
    if (!empty($_POST['note'])) {
        $note = strip_tags(htmlentities($_POST['note'], ENT_QUOTES));
    }
    else {
        $msg_note = 'Vous devez donner une note à \'article';
        $msg .= 'Vous devez donner une note à \'article';
    }
    if (empty($msg)) {
        sendComment ($commentaire, $note, $_SESSION['utilisateur']['id_membre'], $_POST['comment_id_article']);
        $pos = strrpos($_SERVER['REQUEST_URI'], '/');
        $pos = substr($_SERVER['REQUEST_URI'], 0, $pos);
        header('location:' . $pos);
    }
 }

$page = str_replace('-', ' ', $_GET['page']);
if (isset($_GET['cat'])) {
    $cat = str_replace('-', ' ', $_GET['cat']);
}
if (isset($_GET['product'])) {
    $product = str_replace('-', ' ', $_GET['product']);
}
if (isset($_GET['cat']) && !isset($_GET['product'])) {
    if (verifCat($cat)) {
        $productsNews = getProductNews ($page, $cat, 20);

        // PAGINATION

        $nbArticlesParPage = 8;
        $nbArtTotal = countAllFromCat($page, $cat);
        $totalArticles = $nbArtTotal[0]['total'];
        $nbPages = ceil($totalArticles/$nbArticlesParPage);

        if(isset($_GET['p'])) { // Si la variable $_GET['page'] existe...
            $pageActuelle=intval(str_replace('p-', '', $_GET['p']));
            if($pageActuelle > $nbPages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
            {
                $pageActuelle = $nbPages;
            }
        }
        else // Sinon
        {
            $pageActuelle = 1; // La page actuelle est la n°1
        }
        $firstEntry = ($pageActuelle - 1) * $nbArticlesParPage;
        $products = getProduct ($page, $cat, $firstEntry, $nbArticlesParPage);

        // FIN PAGINATION
        include(dirname(__FILE__) . '/../vues/products.php');
    }
    else {
        header('location:' . RACINE_SITE . 'accueil');
        exit();
    }
}
else if (isset($_GET['cat']) && isset($_GET['product'])) {
    if (verifProduct ($page, $cat, $product)) {
        $productDetails = getProductDetails ($page, $cat, $product);
        $avis = getAvisFromProduct ($product);
        include(dirname(__FILE__) . '/../vues/products_details.php');
    }
    /*else {
        header('location:' . RACINE_SITE . 'index.php?page=index');
        exit();
    }*/
}
else {
    $cats = getCat ($page);
    include(dirname(__FILE__) . '/../vues/pc-gaming.php');
}

?>
