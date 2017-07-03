<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
//var_dump($cats);
 ?>
    <h2 class="block-titre-principal"><?php echo ucfirst($page); ?></h2>
    <?php foreach ($cats AS $key => $nextArray) :?>
        <a href="<?php echo '/game_zone/' . $page . '/' . str_replace(' ', '-', strtolower($nextArray['nom'])); ?>">
            <div class="block main-block product-block" style="background: url('<?php echo $nextArray['background_img']; ?>') no-repeat center; background-size: cover;">
            </div>
        </a>
    <?php endforeach; ?>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
