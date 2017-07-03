<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
<h2 class="block-titre-principal">Paiement validé</h2>
<div class="product-details-container">
    <div class="block main-block block-panier">
        <h2 style="line-height: 26px;padding: 0 50px;">Votre commande d'un montant total de <span style="color: #0085b2"><?php echo $_SESSION['prix_total']; ?></span> a été validée, un mail récapitulatif va vous être envoyé dans quelques instants. Toute l'équipe de <span style="color: #0085b2;">Game Zone FRANCE</span> vous souhaite une bonne réception de vos articles et vous remercie de votre confiance.<br>A bientôt sur <span style="color: #0085b2;">Game Zone FRANCE</span> avec toujours plus de bons plans!</h2>
    </div>
</div>
 <?php
 //var_dump($productDetails);
 //var_dump($_SERVER);
 //var_dump($_SESSION);
 //var_dump($_POST);
 //unset($_SESSION['panier']);
 //unset($_SESSION['last_panier']);
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
