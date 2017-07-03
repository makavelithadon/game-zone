<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
//var_dump($productsNews);
$tab_replace = array(" ", "'");
 ?>
    <h2 class="block-titre-principal"><?php echo ucfirst($cat); ?></h2>
    <?php if (!isset($_GET['p']) || (isset($_GET['p']) && $_GET['p'] == 'p-1')) : ?>
    <?php if ($productsNews) : ?>
    <h2 class="titre-products">Nouveautés</h2>
    <div class="container-products">
    <?php foreach ($productsNews AS $key => $nextArray) :?>
    <!----><a href="<?php if ($_GET['page'] != 'pc-gaming') {echo RACINE_SITE . $page . '/' . str_replace(' ', '-', $cat) . '/' . $nextArray['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $nextArray['nom']));} else {echo RACINE_SITE . $_GET['page'] . '/' . str_replace(' ', '-', $cat) . '/' . $nextArray['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $nextArray['nom']));} ?>"><!--
    --><div class="block block-square products">
                <div class="news-block-1">
                    <div class="news-logo">
                      <?php echo $nextArray['marque']; ?>
                  </div>
                  <div class="news-titre .titre-products">
                      <?php echo $nextArray['nom']; ?>
                  </div>
                    <div class="img" style="background: url('<?php echo $nextArray['image_1']; ?>') no-repeat center;">
                    </div>
                </div>
                <div class="news-block-2">
                <div class="block-hover">
                </div>
                <div class="left">
                </div>
                <div class="right">
                  <div class="block-price">
                    <div class="price">
                      <?php
                      $price = searchPointPrice ($nextArray['prix']);
                      echo $price;
                      ?>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
          </div><!--
      --></a><!--
    <?php endforeach;?>
--></div>
<?php endif; ?>
<?php endif; ?>
<?php if ($products) : ?>
<h2 class="titre-products">Tous nos articles <?php echo ucfirst($cat); ?></h2>
<div class="container-products">
<?php foreach ($products AS $key => $nextArray) :?>
    <!----><a href="<?php if ($_GET['page'] != 'pc-gaming') {echo RACINE_SITE . $page . '/' . str_replace(' ', '-', $cat) . '/' . $nextArray['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $nextArray['nom']));} else {echo RACINE_SITE . $_GET['page'] . '/' . str_replace(' ', '-', $cat) . '/' . $nextArray['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', $nextArray['nom']));} ?>"><!--
    --><div class="block block-square products">
                <div class="news-block-1">
                    <div class="news-logo">
                      <?php echo $nextArray['marque']; ?>
                  </div>
                  <div class="news-titre .titre-products">
                      <?php echo $nextArray['nom']; ?>
                  </div>
                    <div class="img" style="background: url('<?php echo $nextArray['image_1']; ?>') no-repeat center;">
                    </div>
                </div>
                <div class="news-block-2">
                <div class="block-hover">
                </div>
                <div class="left">
                </div>
                <div class="right">
                  <div class="block-price">
                    <div class="price">
                        <?php
                        $price = searchPointPrice ($nextArray['prix']);
                        echo $price;
                        ?>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
          </div><!--
      --></a><!--
<?php endforeach;?>
--></div>
<?php endif; ?>
<?php if ($totalArticles > $nbArticlesParPage) : ?>
<nav class="pagination">
    <ul>
        <?php for ($i = 1; $i <= $nbPages; $i++) {
                if ($i == $pageActuelle) : ?>
                <li class="active"><a><?php echo $i; ?></a></li>
                <?php
                else : ?>
                <li><a href="/game_zone/<?php echo $page . '/' . str_replace(' ', '-', $cat); ?>/p-<?php echo $i; ?>"><p><?php echo $i; ?></p></a></li>
                <?php
                endif;
            }
            ?>
    </ul>
</nav>
<?php
endif;
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
