<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');

 ?>
    <h2 class="block-titre-principal">Inscription terminée</h2>
        <div class="block main-block inscription-ok">
            <h3>Félicitations, <span><?php echo $_SESSION['last_inscrit']; ?></span></h3>
            <h4>Votre inscription a bien été enregistrée, un mail de bienvenue va vous être envoyé dans les prochaines minutes ! <br>Vous faites désormais partie de la Game ZONE !</h4>
        </div>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
