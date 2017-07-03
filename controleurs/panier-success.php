<?php
include(dirname(__FILE__) . '/../modeles/panier-success.php');

if (!isset($_SESSION['payment-ok'])) {
    header('location:' . RACINE_SITE . 'panier');
    exit();
}

include(dirname(__FILE__) . '/../vues/panier-success.php');

unset($_SESSION['payment-ok']);
?>
