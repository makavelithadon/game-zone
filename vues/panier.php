<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
<h2 class="block-titre-principal">Mon panier</h2>
<div class="product-details-container">
    <div class="block main-block block-panier">
        <?php if (!isset($_SESSION['panier']) || (isset($_SESSION['panier']) && empty($_SESSION['panier']['id_article']))) : ?>
            <h2>Votre panier est vide</h2>
            <a class="btn-go" href="/game_zone/accueil">
                Poursuivre mes achats
            </a>
        <?php elseif (isset($_SESSION['panier']) && !empty($_SESSION['panier']['id_article'])) : ?>
            <h2>Votre panier contient <?php echo $panier; ?> article<?php if ($panier > 1) {echo 's';} ?></h2>
            <table border=1>
                <?php
                $c = count($_SESSION['panier']['id_article']);
                $_SESSION['prix_total'] = 0;
                for ($i = 0; $i < $c; $i++) : ?>
                <tr class="ligne-<?php echo $i; ?>">
                    <form class="formQteSupprPanier" action="" method="POST">
                        <input type="hidden" name="id_article<?php echo $i; ?>" id="idArticlePanier" value="<?php echo $_SESSION['panier']['id_article'][$i]; ?>" />
                        <td class="panier-image" style="width: 16.66666%!important;background: url('<?php echo $_SESSION['panier']['image_1'][$i]; ?>') no-repeat center 50% / 50%;"><a href="<?php echo $_SESSION['panier']['url'][$i]; ?>"></a></td>
                        <td class="panier-nom"><?php echo $_SESSION['panier']['nom'][$i]; ?></td>
                        <td class="panier-marque"><?php echo $_SESSION['panier']['marque'][$i]; ?></td>
                        <td class="panier-prix"><?php $sumPrices = searchPointPrice (number_format($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i], 2, '.', '')); echo $sumPrices; $_SESSION['prix_total'] += ($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i]); ?></td>
                        <td class="panier-quantite"><a href="#"><input type="submit" class="qte-span-1 submitQte" name="submitQte<?php echo $i; ?>" value="-"></a><?php echo $_SESSION['panier']['quantite'][$i]; ?><a href="#"><input type="submit" class="qte-span-2 submitQte" name="submitQte<?php echo $i; ?>" value="+"></a></td>
                        <td class="panier-trash"><input type="submit" class="submitQte" name="submitTrash<?php echo $i; ?>" value="suppr"></td>
                    </form>
                </tr>
                <?php endfor; ?>
            </table>
            <h3 class="total-step-1">Total de vos articles<span class="span-prix"><?php $_SESSION['prix_total'] = searchPointPrice (number_format($_SESSION['prix_total'], 2, '.', '')); echo $_SESSION['prix_total']; ?></span></h3>
            <div class="btn-panier-step1">
                <a class="btn-go" href="<?php echo substr($_SESSION['last_panier']['url'], 0, strrpos($_SESSION['last_panier']['url'], '/')); ?>">
                    Poursuivre mes achats
                </a>
                <a class="btn-panier" href="<?php echo RACINE_SITE . 'panier-final'; ?>">
                    Finaliser ma commande
                </a>
            </div>
            <div class="clear"></div>
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
