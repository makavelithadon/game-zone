<?php
include(dirname(__FILE__) . '/../modeles/panier.php');

if (isset($_SESSION['panier'])) {
    $c = count($_SESSION['panier']['id_article']);
    for ($i = 0; $i < $c; $i++) {
        if (isset($_POST["submitQte$i"])) {
            modifierQtePanier ($_POST["id_article$i"], $_POST["submitQte$i"]);
            header('location:' . $_SERVER['REQUEST_URI']);
        }
        elseif (isset($_POST["submitTrash$i"])) {
            retirerArticlePanier ($_POST["id_article$i"]);
            header('location:' . $_SERVER['REQUEST_URI']);
        }
    }
}

include(dirname(__FILE__) . '/../vues/panier.php');


?>
