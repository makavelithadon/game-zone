<?php
include(dirname(__FILE__) . '/../../inc/header.inc.php');
include(dirname(__FILE__) . '/../../inc/nav.inc.php');
include(dirname(__FILE__) . '/../../inc/section.inc.php');
//var_dump($getAllProducts);
//var_dump($tabCat);
//var_dump($tabSsCat);
//var_dump($_POST);
//var_dump($_FILES);
//var_dump($allFromProduct);
//echo $msg;
 ?>
        <h2 class="block-titre-principal">Gestion des articles</h2>
        <div class="block main-block">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'afficher') : ?>
            <h2 class="list-produits">Liste de tous les articles de la <span style="color: #0085b2;">Game ZONE</span></h2>
            <table id="tableUser" class="table" border=1 style="font-size: .9em;">
                <tr>
                    <?php $count = count($getAllProducts[0]); ?>
                    <?php $i = 0; ?>
                    <?php foreach ($getAllProducts[0] AS $key => $val) : ?>
                        <th style="font-size: .9em;"><?php echo $key; ?></th>
                        <?php if ($i == $count -1) : ?>
                            <th style="font-size: .9em;"><?php echo 'Modifier'; ?></th>
                            <th style="font-size: .9em;"><?php echo 'Supprimer'; ?></th>
                        <?php endif; ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($getAllProducts AS $k => $v) : ?>
                    <tr>
                        <?php $i = 0; ?>
                        <?php foreach ($v AS $k2 => $v2) : ?>
                            <?php if ($k2 == 'Photo') : ?>
                                <td style="font-size: .82em;background: url('<?php echo $v2; ?>') no-repeat center 50% / 100%;"></td>
                            <?php elseif ($k2 == 'ID') : ?>
                                <td style="font-size: .82em;background: #323844;color: #fff;text-shadow: 0 0 .25em #000;border-right: 1px solid #999;"><?php echo $v2; ?></td>
                            <?php else : ?>
                                <td style="font-size: .82em;"><?php echo $v2; ?></td>
                            <?php endif; ?>
                            <?php if ($i == $count -1) : ?>
                                <td style="font-size: .82em;">
                                    <a class="product-modif" href="/game_zone/admin/gestion-articles/modifier/product-<?php echo $v['ID']; ?>">Modifier</a>
                                </td>
                                <td>
                                    <form class="formTrashProduct" action="" method="post">
                                        <input type="hidden" name="id_article" value="<?php echo $v['ID']; ?>">
                                        <input class="product-trash" type="submit" name="submitTrashProd" value="Delete" >
                                    </form>
                                </td>
                            <?php endif; ?>
                            <?php $i++;?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif (isset($_GET['action']) && ($_GET['action'] == 'ajouter' || $_GET['action'] == 'modifier')) : ?>
            <h2 class="list-produits" style="margin: 18px auto 50px auto;"><?php if ($_GET['action'] == 'ajouter'){echo 'Ajouter un produit à la <span style="color: #0085b2;">Game ZONE</span>';}else {echo 'Modifier le produit <span style="color: #0085b2;">' . $allFromProduct[0]['nom'] . '</span>';} ?></h2>
            <form class="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-container">
                    <div class="form-container-c" style="margin: 30px auto;">
                        <label for="id_article" style="text-align:center;<?php if ($_GET['action'] == 'ajouter') {echo 'display:none;';} ?>">ID article</label>
                        <input style="margin: 0 auto;display: block;" type="<?php if (isset($_GET['action']) && $_GET['action'] == 'modifier') {echo "text";} else {echo "hidden";} ?>" name="id_article" id="id_article" value="<?php if(isset($_GET['action']) && $_GET['action'] == 'modifier') {echo $get_product;} ?>" <?php if (isset($_GET['action']) && $_GET['action'] == 'modifier') {echo "readonly";} ?>>
                    </div>
                        <div class="form-container-l">
                            <div class="form-container-block">
                                <label for="pseudo">Catégorie *</label>
                                <select class="cat-add-product" name="categorie" required>
                                    <?php for ($i = 1; $i <= count($tabCat); $i++) : ?>
                                        <?php if ($i == 1) : ?>
                                            <option value="">Sélectionnez la catégorie</option>
                                            <option value="<?php echo $i . ' - ' . $tabCat[$i -1]['nom']; ?>" <?php if (isset($_POST['categorie']) && $_POST['categorie'] == $i) {echo 'selected';}else if (isset($get_product) && $allFromProduct[0]['id_categorie'] == $i) {echo "selected";} ?>><?php echo $i . ' - ' . $tabCat[$i -1]['nom']; ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $i . ' - ' . $tabCat[$i -1]['nom']; ?>" <?php if (isset($_POST['categorie']) && $_POST['categorie'] == $i) {echo 'selected';}else if (isset($get_product) && $allFromProduct[0]['id_categorie'] == $i) {echo "selected";} ?>><?php echo $i . ' - ' . $tabCat[$i -1]['nom']; ?></option>
                                        <?php endif; ?>
                                <?php endfor; ?>
                                </select>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_categorie)){echo $msg_categorie;} ?>
                            </div>
                            <div class="form-container-block">
                                <label for="titre">Titre *</label>
                                <input type="text" name="titre" id="titre" value="<?php if(isset($_POST['titre'])){echo $_POST['titre'];}else if (isset($get_product)) {echo $allFromProduct[0]['nom'];} ?>" placeholder="Required" required>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_titre)){echo $msg_titre;} ?>
                            </div>
                            <div class="form-container-block textarea">
                                <label for="description">Description *</label>
                                <textarea class="textarea-product" name="description" rows="8" cols="40" required placeholder="Brève description de l'article - Required"><?php if (isset($_POST['description'])) {echo $_POST['description'];}else if (isset($get_product)) {echo $allFromProduct[0]['description'];} ?></textarea>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_description)){echo $msg_description;} ?>
                            </div>
                            <div class="form-container-block image">
                                <?php if (isset($get_product)) : ?>
                                    <h2>Image principale actuelle</h2>
                                    <div class="photo-actuelle" style="background: url('<?php echo $allFromProduct[0]['image_1']; ?>') no-repeat center 50% / 70%;">

                                    </div>
                                <?php endif; ?>
                                <label for="image_1">Image principale *</label>
                                <input id="image1" type="file" name="image_1" id="image_1" value="<?php if(isset($_FILES['image_1'])){echo $_FILES['image_1']['name'];} ?>" <?php if (isset($_GET['action']) && $_GET['action'] == 'ajouter') {echo "required";} ?>>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_image_1)){echo $msg_image_1;} ?>
                            </div>
                            <div class="form-container-block image">
                                <?php if (isset($get_product) && $allFromProduct[0]['image_3'] != NULL) : ?>
                                    <h2>Image 3 actuelle</h2>
                                    <div class="photo-actuelle" style="background: url('<?php echo $allFromProduct[0]['image_3']; ?>') no-repeat center 50% / 70%;">

                                    </div>
                                <?php endif; ?>
                                <label for="image_3">Image 3</label>
                                <input type="file" name="image_3" id="image_3" value="<?php if(isset($_FILES['image_3'])){echo $_FILES['image_3']['name'];} ?>">
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_image_3)){echo $msg_image_3;} ?>
                            </div>
                            <div class="form-container-block">
                                <label for="quantite">Quantité *</label>
                                <input type="number" name="quantite" id="quantite" value="<?php if(isset($_POST['quantite'])){echo $_POST['quantite'];}else if (isset($get_product)) {echo $allFromProduct[0]['quantite'];} ?>" required placeholder="Required" min="1" max="10000" step=1>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_quantite)){echo $msg_quantite;} ?>
                            </div>
                        </div>
                        <div class="form-container-r">
                            <div class="form-container-block">
                                <label for="rayon">Rayon *</label>
                                <select class="rayon-add-product" name="rayon" required>
                                    <?php for ($i = 1; $i <= count($tabSsCat); $i++) : ?>
                                        <?php if ($i == 1) : ?>
                                            <option value="">Sélectionnez le rayon</option>
                                            <option value="<?php echo $i . ' - ' . $tabSsCat[$i -1]['nom']; ?>" <?php if (isset($_POST['rayon']) && $_POST['rayon'] == $i) {echo 'selected';}else if (isset($get_product) && $allFromProduct[0]['id_sous_categorie'] == $i) {echo "selected";} ?>><?php echo $i . ' - ' . $tabSsCat[$i -1]['nom']; ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $i . ' - ' . $tabSsCat[$i -1]['nom']; ?>" <?php if (isset($_POST['rayon']) && $_POST['rayon'] == $i) {echo 'selected';}else if (isset($get_product) && $allFromProduct[0]['id_sous_categorie'] == $i) {echo "selected";} ?>><?php echo $i . ' - ' . $tabSsCat[$i -1]['nom']; ?></option>
                                        <?php endif; ?>
                                <?php endfor; ?>
                                </select>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_rayon)){echo $msg_rayon;} ?>
                            </div>
                            <div class="form-container-block">
                                <label for="marque">Marque *</label>
                                <input type="text" name="marque" id="marque" value="<?php if(isset($_POST['marque'])){echo $_POST['marque'];}else if (isset($get_product)) {echo $allFromProduct[0]['marque'];} ?>" placeholder="Marque, studio, éditeur..." required>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_marque)){echo $msg_marque;} ?>
                            </div>
                            <div class="form-container-block textarea">
                                <label for="description_detaillee">Description détaillée</label>
                                <textarea class="textarea-product" name="description_detaillee" rows="8" cols="40" placeholder="Description plus fournie" required><?php if (isset($_POST['description_detaillee'])) {echo $_POST['description_detaillee'];}else if (isset($get_product)) {echo $allFromProduct[0]['description_detaillee'];} ?></textarea>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_description_detaillee)){echo $msg_description_detaillee;} ?>
                            </div>
                            <div class="form-container-block image">
                                <?php if (isset($get_product) && $allFromProduct[0]['image_2'] != NULL) : ?>
                                    <h2>Image 2 actuelle</h2>
                                    <div class="photo-actuelle" style="background: url('<?php echo $allFromProduct[0]['image_2']; ?>') no-repeat center 50% / 70%;">

                                    </div>
                                <?php endif; ?>
                                <label for="image_2">Image 2</label>
                                <input type="file" name="image_2" id="image_2" value="<?php if(isset($_FILES['image_2'])){echo $_FILES['image_2']['name'];} ?>">
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_image_2)){echo $msg_image_2;} ?>
                            </div>
                            <div class="form-container-block">
                                <label for="prix">Prix *</label>
                                <input type="text" name="prix" id="prix" value="<?php if(isset($_POST['prix'])){echo $_POST['prix'];}else if (isset($get_product)) {echo $allFromProduct[0]['prix'];} ?>" placeholder="Utilisez le . comme séparateur - Required" required>
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_prix)){echo $msg_prix;} ?>
                            </div>
                            <div class="form-container-block">
                                <label for="video">Vidéo</label>
                                <input type="file" name="video" id="video" value="<?php if(isset($_FILES['video'])){echo $_FILES['video']['name'];} ?>">
                            </div>
                            <div class="error-msg">
                                <?php if(isset($msg_video)){echo $msg_video;} ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <input type="submit" name="submit" value="<?php if (isset($_GET['action']) && $_GET['action'] == 'ajouter') {echo 'Ajouter l\'article';}else {echo 'Modifier l\'article';}?>">
                </div>
            </form>
        <?php else : ?>
            <div class="choice">
                <a class="btn primary" href="/game_zone/admin/gestion-articles/ajouter">Ajouter un article au catalogue</a>
                <a class="btn secondary" href="/game_zone/admin/gestion-articles/afficher">Afficher la liste des produits</a>
            </div>
        <?php endif; ?>
        </div>
 <?php
include(dirname(__FILE__) . '/../../inc/footer.inc.php');
?>
