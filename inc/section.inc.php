<div id="maskSection">
    <div id="mainSection">
      <section id="sectionTop">
        <div class="bandeau-sectionTop">
            <div class="user <?php if(userEstConnecteEtEstAdmin()){echo 'adm';} ?>">Bonjour, <span><?php if(userEstConnecte()){echo '<a class="move-link" href="/game_zone/profil">' . $_SESSION['utilisateur']['pseudo'] . '</a>';}else{echo 'visiteur';} ?></span></div>
            <div id="panier" class="panier <?php if(userEstConnecteEtEstAdmin()){echo 'adm';} ?>"><a href="/game_zone/panier/"><span class="span-1"></span><span id="numPanier">
			<?php
			$panier = 0;
			if (isset($_SESSION['panier'])) {
				foreach ($_SESSION['panier']['quantite'] AS $key => $val) {
					$panier += $val;
				}
			}
			echo $panier;
			?>
			</span></a></div>
        </div>
      </section>
      <section id="sectionBody">
          <div class="search-container">
              <div class="search-block">
                  <form id="searchForm" class="form-search" action="/game_zone/search-results" method="get">
                      <input id="searchInput" type="text" name="search" value="" placeholder="Saisissez votre recherche" autocomplete=off><!--
                      --><input id="searchSubmit" type="submit" value="">
                  </form>
              </div>
              <div class="clear"></div>
              <div id="searchResults">
                  <table id="tableResults">
                  </table>
              </div>
              <div class="clear"></div>
          </div>
		<div id="container">
        <?php if (userEstConnecteEtEstAdmin()) : ?>
            <div class="container-adm">
                <div class="title-adm">
                    <h2>Menu administrateur</h2>
                </div>
                <div class="nav-adm">
                    <ul><!--
                    --><li><a href="/game_zone/admin/gestion-articles" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'gestion-articles') {echo 'class="active"';} ?>>Gestion des articles</a></li><!--
                    --><li><a href="/game_zone/admin/gestion-membres" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'gestion-membres') {echo 'class="active"';} ?>>Gestion des membres</a></li><!--
                    --><li><a href="/game_zone/admin/gestion-commentaires" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'gestion-commentaires') {echo 'class="active"';} ?>>Gestion des commentaires</a></li><!--
                    --><li><a href="/game_zone/admin/gestion-commandes" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'gestion-commandes') {echo 'class="active"';} ?>>Gestion des commandes</a></li><!--
                    --></ul>
                    <ul><!--
                    --><li><a href="/game_zone/admin/statistiques" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'statistiques') {echo 'class="active"';} ?>>Statistiques</a></li><!--
                    --><li><a href="/game_zone/admin/envoi-newsletter" <?php if (isset($_GET['admin']) && $_GET['admin'] == 'envoi-newsletter') {echo 'class="active"';} ?>>Envoi de la newsletter</a></li><!--
                    --></ul>
                </div>
            </div>
        <?php endif; ?>
