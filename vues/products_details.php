<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
//var_dump($productDetails);
//var_dump($avis);
$tab_replace = array(" ", "'");
 ?>
    <h2 class="block-titre-principal">Fiche produit</h2>
    <div class="product-details-container">
        <div class="product-details-block block-left">
            <div id="imgBackgrd" class="container-img" style="background: url('<?php echo html_entity_decode($productDetails[0]['image_1'], ENT_QUOTES); ?>') no-repeat center #fefefe;">

            </div>
            <div class="container-tinys-img">
                <div class="null"></div>
                <?php if ($productDetails[0]['image_1'] != null) : ?>
                <div class="tinys-img-1 imgSlider" style="background: url('<?php echo html_entity_decode($productDetails[0]['image_1'], ENT_QUOTES); ?>') no-repeat center #fefefe;">
                </div>
                <?php endif; ?>
                <?php if ($productDetails[0]['image_2'] != null) : ?>
                <div class="tinys-img-2 imgSlider" style="background: url('<?php echo html_entity_decode($productDetails[0]['image_2'], ENT_QUOTES); ?>') no-repeat center #fefefe;">
                </div>
                <?php endif; ?>
                <?php if ($productDetails[0]['image_3'] != null) : ?>
                <div class="tinys-img-3 imgSlider" style="background: url('<?php echo html_entity_decode($productDetails[0]['image_3'], ENT_QUOTES); ?>') no-repeat center #fefefe;">
                </div>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="product-details-block block-right">
            <div class="container-desc">
                <div class="marque">
                    <?php echo html_entity_decode($productDetails[0]['marque'], ENT_QUOTES); ?>
                </div>
                <h2 class="titre-product">
                    <?php echo html_entity_decode($productDetails[0]['nom'], ENT_QUOTES); ?>
                </h2>
                <div class="etoiles-container">
                    <div class="etoiles-content">
                    </div>
                    <?php if ($productDetails[0]['avis_moyenne_note'] != null) : ?>
                        <div class="mask-etoiles" style="width: <?php echo (html_entity_decode($productDetails[0]['avis_moyenne_note'], ENT_QUOTES) * 11.6); ?>px;">
                        </div>
                    <?php endif; ?>
                    <div class="mask-etoiles-grey">
                    </div>
                </div>
                <div class="etoiles-avis">
                    <?php if ($avis)  :?>
                        <?php echo count($avis); ?> avis clients
                    <?php else : ?>
                        Aucun avis client
                    <?php endif; ?>
                </div>
                <h3 class="descr-prod">DESCRIPTION</h3>
                <p class="parag">
                    <?php echo cut(html_entity_decode($productDetails[0]['description'], ENT_QUOTES), 150, '...'); ?>
                </p>
                <div class="block-buy">
                    <h3><span class="stock">EN STOCK</span> <span class="vendu-et-expedie">Vendu et expédié par <span class="game-zone">Game Zone FRANCE SA</span></span></h3>
                    <div class="prix-achat">
                        <div class="prix">
                            <?php
                            $verifPointPrice = searchPointPrice (html_entity_decode($productDetails[0]['prix'], ENT_QUOTES));
                            echo $verifPointPrice;
                             ?>
                        </div>
                        <div class="achat">
                            <form id="formAddChart" action="/game_zone/product-tmp-redirect" method="post">
                                <input type="hidden" id="id_article" name="id_article" value="<?php echo html_entity_decode($productDetails[0]['id_article']); ?>">
                                <input type="hidden" id="nom" name="nom" value="<?php echo html_entity_decode($productDetails[0]['nom'], ENT_QUOTES); ?>">
                                <input type="hidden" id="marque" name="marque" value="<?php echo html_entity_decode($productDetails[0]['marque'], ENT_QUOTES); ?>">
                                <input type="hidden" id="image_1" name="image_1" value="<?php echo html_entity_decode($productDetails[0]['image_1'], ENT_QUOTES); ?>">
                                <input type="hidden" id="prix" name="prix" value="<?php echo html_entity_decode($productDetails[0]['prix'], ENT_QUOTES); ?>">
                                <input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                <input type="submit" id="submit" name="submit" class="btn-achat" value="AJOUTER AU PANIER">
                            </form>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="product-details-block large desc-detail">
            <h2>Description détaillée</h2>
            <p>
                <?php echo html_entity_decode($productDetails[0]['description_detaillee'], ENT_QUOTES); ?>
            </p>
        </div>
        <h2 class="block-titre-principal">Avis clients</h2>
        <div class="product-details-block large">
        <?php if ($avis) : ?>
            <?php foreach ($avis AS $k => $v) : ?>
                <div class="block-avis"><!--
                --><div class="avis-l">
                        <h4><?php echo html_entity_decode($v['pseudo'], ENT_QUOTES); ?></h4>
                        <h5><?php echo 'Le ' . html_entity_decode($v['avis_date']); ?></h5>
                        <h6 style="position: relative;"><?php echo 'Note ' . html_entity_decode($v['note'], ENT_QUOTES) . '/<span style="font-size:1.25em; position: absolute;top: -1px;">10</span>'; ?></h6>
                        <div class="etoiles-container avis">
                            <div class="etoiles-content">
                            </div>
                            <div class="mask-etoiles" style="width: <?php echo (html_entity_decode($v['note'], ENT_QUOTES) * 11.6); ?>px;">
                            </div>
                            <div class="mask-etoiles-grey">
                            </div>
                        </div>
                    </div><!--
                --><div class="avis-c">

                </div><!--
                --><div class="avis-r">
                    <div class="content">
                        <p>
                            <?php echo html_entity_decode($v['commentaire'], ENT_QUOTES); ?>
                        </p>
                    </div>
                    </div><!--
                --></div>
                    <?php //echo $v['pseudo'] .  $v['note'] . $v['commentaire'] . $v['date'];?>

            <?php endforeach; ?>
        <?php else : ?>
            <div class="none-avis">
            <?php if (!isset($_GET['comment'])) : ?>
                <h2>Il n'y a actuellement aucun avis pour ce produit</h2>
            <?php endif; ?>
            </div>
        <?php endif; ?>
            <div class="let-comment">
                <?php if (!isset($_GET['comment'])) : ?>
                    <?php if (userEstConnecte ()) : ?>
                        <?php if ($avis) : ?>
                            <a class="move-link" style="color: #0085b2;" href="<?php echo RACINE_SITE . $page . '/' . str_replace(' ', '-', $cat) . '/' . $productDetails[0]['id_article'] . '-' . strtolower(str_replace($tab_replace, '-', html_entity_decode($productDetails[0]['nom'], ENT_QUOTES))) . '/' . 'let-comment'; ?>">Postez un avis</a>
                        <?php else : ?>
                            <h3><a class="move-link" href="<?php echo RACINE_SITE . $page . '/' . str_replace(' ', '-', $cat) . '/' . html_entity_decode($productDetails[0]['id_article'], ENT_QUOTES) . '-' . strtolower(str_replace($tab_replace, '-', html_entity_decode($productDetails[0]['nom'], ENT_QUOTES))) . '/' . 'let-comment'; ?>">Soyez le premier à poster votre avis</a></h3>
                        <?php endif; ?>
                    <?php else : ?>
                        <h3>Vous devez vous <a class="move-link" href="/game_zone/connexion">connecter</a> pour laisser un avis sur ce produit</h3>
                    <?php endif; ?>
                <?php else : ?>
                    <h2>Laissez votre avis sur ce produit</h2>
                    <form class="form form-inscr" action="" method="post">
                        <div class="form-container comment">
                            <input type="hidden" name="comment_id_article" value="<?php echo html_entity_decode($productDetails[0]['id_article'], ENT_QUOTES); ?>">
                            <label for="commentaire">Votre commentaire</label>
                            <textarea id="commentaire" name="commentaire" rows="8" cols="40"><?php if(isset($_POST['commentaire'])) echo $_POST['commentaire']; ?></textarea>
                            <div class="error-msg">
                                <?php if(isset($msg_commentaire)){echo $msg_commentaire;} ?>
                            </div>
                            <label for="note">Votre note</label>
                            <select name="note" id="note">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <?php if($i == 1) : ?>
                                        <option value=""></option>
                                    <option value="<?php echo $i; ?>" <?php if (isset($_POST['note']) && $_POST['note'] == $i) {echo 'selected';} ?>><?php echo $i ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $i; ?>" <?php if (isset($_POST['note']) && $_POST['note'] == $i) {echo 'selected';} ?>><?php echo $i ?></option>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                            <div class="error-msg">
                                <?php if(isset($msg_note)){echo $msg_note;} ?>
                            </div>
                            <input type="submit" name="submit" value="Valider">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

 <?php
 //var_dump($productDetails);
 //var_dump($_SERVER);
 //var_dump($_SESSION);
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
