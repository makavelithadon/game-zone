<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
        <h2 class="block-titre-principal">Connexion</h2>
        <div class="block main-block">
            <form class="form form-conn" action="" method="POST">
                <div class="form-container">
                    <div class="form-container-c">
                        <div class="form-container-block">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>" placeholder="Required" required>
                        </div>
                        <div class="error-msg">
                            <?php if(isset($msg_pseudo)){echo $msg_pseudo;} ?>
                        </div>
                        <div class="form-container-block">
                            <label for="pass">Mot de passe</label>
                            <input type="password" name="pass" id="pass" value="<?php if(isset($password_1)){echo $_POST['password'];} ?>" placeholder="Required" required>
                        </div>
                        <div class="error-msg">
                            <?php if(isset($msg_pass)){echo $msg_pass;} ?>
                        </div>
                        <div class="clear"></div>
                        <input type="submit" name="connexion" value="Connexion">
                    </div>
                </div>
            </form>
        </div>
 <?php
include(dirname(__FILE__) . '/../inc/footer.inc.php');
?>
