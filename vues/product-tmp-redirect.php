<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');

 ?>
        <h2 class="block-titre-principal">Vous venez d'ajouter ce produit au panier</h2>
		<div class="block main-block">
			<div class="l-no-js">
				<h3><?php echo $_SESSION['last_panier']['nom']; ?></h3>
				<h4><?php echo $_SESSION['last_panier']['marque']; ?></h4>
			</div>
			<div class="c-no-js" style="background: url('<?php echo $_SESSION['last_panier']['image_1']; ?>') no-repeat center 50% / 60%;">
				
			</div>
			<div class="r-no-js">
				<div class="container-link-panier">
					<a id="btnPanier" class="btn-panier" href="/game_zone/panier">
						Voir mon panier
					</a>
					<a id="btnGo" class="btn-go" href="<?php echo $_SESSION['last_panier']['url']; ?>">
						Poursuivre mes achats
					</a>
				</div>
			</div>
			<div class="clear"></div>
        </div>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
