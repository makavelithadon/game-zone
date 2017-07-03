<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
<h2 class="block-titre-principal">Finalisation de ma commande</h2>
<div class="product-details-container">
    <div class="block main-block block-panier">
        <?php if (!userEstConnecte()) : ?>
            <h3>Vous devez vous <a class="move-link" href="<?php echo RACINE_SITE . 'connexion'; ?>">connecter</a> ou <a class="move-link" href="<?php echo RACINE_SITE . 'inscription'; ?>">inscrire</a> pour finaliser votre commande</h3>
        <?php else : ?>
            <div class="">
                <div class="panier-final-l">
                    <div class="infos-produits">
                        <h3>Côut total de votre commande</h3>
                        <h3 class="prix-total"><?php echo $_SESSION['prix_total']; ?></h3>
                        <form id="formChartPayment" class="form-payment" action="" method="post">
                            <input type="hidden" id="countPanier" name="countPanier" value="<?php echo count($_SESSION['panier']['id_article']); ?>">
                            <input type="submit" id="submitPayment" name="submitPayment" value="VALIDER LE PAIEMENT" >
                            <div class="container-checkbox">
                                <input id="cgv" type="checkbox" name="cgv" value=""> J'accepte les Conditions Générales de Vente <br><br>*consulter les <a class="move-link" href="/game_zone/cgv">CGV</a>
                            </div>
                        </form>
                    </div>
                    <div id="errorMsgCGV" class="error-msg-cgv">
						<?php if(isset($msg_cgv)) {echo $msg_cgv;} ?>
                    </div>
                </div>
                <div class="panier-final-r">
                    <div class="infos-livraison">
                        <h3>Vos informations de livraison</h3>
                        <?php

                        if ($_SESSION['utilisateur']['sexe'] == 'm') {
                            $entite = 'Mr';
                        }
                        else {
                            $entite = 'Mme';
                        }
                        ?>
                        <h4><?php echo $entite; ?></h4>
                        <?php foreach ($_SESSION['utilisateur'] AS $k => $v) : ?>
                            <?php if ($k == 'nom' || $k == 'prenom' || $k == 'ville' || $k == 'cp' || $k == 'adresse') : ?>
                                <h4><?php echo $v; ?></h4>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        <?php endif; ?>
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
