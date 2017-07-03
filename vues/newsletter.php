<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
//var_dump($getInscrit);
 ?>
        <h2 class="block-titre-principal">Connexion</h2>
        <div class="block main-block inscr-newsletter">
            <?php if (isset($connect) && $connect == true) :?>
                <?php if (empty($getInscrit)) : ?>
            <form class="form form-conn" action="" method="POST">
                <form style="margin: 0 auto;width:520px;"method="POST" action="">
            		<input type="hidden" name="id_membre" id="id_membre" value="<?php echo $_SESSION['utilisateur']['id_membre'] ?>" />
            		<input style="display:block; margin: 0 auto;padding: 10px 15px;" type="submit" name="submit" id="submit-newsletter" value="Je souhaite m'abonner à la newsletter" />
            	</form>
            </form>
            <?php else : ?>
                <h2>Merci de votre inscription à la newsletter Game ZONE, <span><?php echo $_SESSION['utilisateur']['pseudo']; ?></span>.<br>Restez connecté et profiter des meilleures offres Gaming !</h2>
            <?php endif; ?>
        <?php else : ?>
            <h2>Vous devez vous <a class="move-link" href="/game_zone/connexion">connecter</a> pour vous inscrire à la newsletter</h2>
        <?php endif; ?>
        </div>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
