<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
        <h2 class="block-titre-principal">Contact</h2>
        <div class="block main-block">
            <form class="form" action="" method="post">
                <div class="form-container contact comment">
                    <?php if(!userEstConnecte()) : ?>
                    <label for="expediteur">Expéditeur</label>
                    <?php endif; ?>
                    <input type="<?php if(userEstConnecte()) {echo 'hidden';}else {echo 'email';} ?>" name="expediteur" id="expediteur" value="<?php if (userEstConnecte()) {echo $_SESSION['utilisateur']['mail'];} elseif(isset($_POST['expediteur'])) {echo $_POST['expediteur'];} ?>">
                    <div class="error-msg" style="text-align: center!important;">
                        <?php if(isset($msg_expediteur)){echo $msg_expediteur;} ?>
                    </div>
                    <label for="sujet">Sujet</label>
                    <input type="text" name="sujet" id="sujet"value="<?php if(isset($_POST['sujet'])) {echo $_POST['sujet'];} ?>">
                    <div class="error-msg" style="text-align: center!important;">
                        <?php if(isset($msg_sujet)){echo $msg_sujet;} ?>
                    </div>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="8" cols="40"><?php if(isset($_POST['message'])) {echo $_POST['message'];} ?></textarea>
                    <div class="error-msg" style="text-align: center!important;">
                        <?php if(isset($msg_message)){echo $msg_message;} ?>
                    </div>
                    <input type="submit" name="submitContact" value="Envoyer">
                </div>
            </form>
        </div>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
