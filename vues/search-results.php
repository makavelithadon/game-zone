<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
$tabReplace = array('\'', ' ', '\"', '_', '(', ')');
 ?>
        <h2 class="block-titre-principal">Résultats de la recherche</h2>
        <div class="container-products">
            <?php foreach ($resultSearch AS $key => $nextArray) :?>
            <!----><a href="<?php echo RACINE_SITE . strtolower(str_replace('é', 'e', (str_replace($tabReplace, '-', $nextArray['categorie_nom'])))) . '/' . strtolower(str_replace('é', 'e', (str_replace($tabReplace, '-', $nextArray['sous_categorie_nom'])))) . '/' . $nextArray['id_article'] . '-' . strtolower(str_replace($tabReplace, '-', $nextArray['article_nom']));?>"><!--
            --><div class="block block-square products">
                        <div class="news-block-1">
                            <div class="news-logo">
                              <?php echo $nextArray['marque']; ?>
                          </div>
                          <div class="news-titre .titre-products">
                              <?php echo $nextArray['article_nom']; ?>
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
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
