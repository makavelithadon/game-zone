<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
 ?>
<h2 class="block-titre-principal">Inscription</h2>
<div class="block main-block">
    <form class="form form-inscr" action="" method="post">
        <div class="form-container">
                <div class="form-container-l">
                    <div class="form-container-block">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_pseudo)){echo $msg_pseudo;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="pass">Mot de passe</label>
                        <input type="password" name="pass" id="pass" value="<?php if(isset($password_1)){echo $_POST['pass'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_pass)){echo $msg_pass;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="confirmPass">Confirmation</label>
                        <input type="password" name="confirm_pass" id="confirmPass" value="<?php if(isset($passwords_ok)){echo $_POST['pass'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_confirm_pass)){echo $msg_confirm_pass;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_nom)){echo $msg_nom;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_prenom)){echo $msg_prenom;} ?>
                    </div>
                </div>
                <div class="form-container-r">
                    <div class="form-container-block">
                        <label for="mail">E-mail</label>
                        <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_mail)){echo $msg_mail;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="sexe">Sexe</label>
                        <div class="sexe">
                            <input type="radio" class="sexe-M" name="sexe" value="m" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'm'){echo 'checked';}elseif(!isset($_POST['sexe'])){echo 'checked';} ?> > M
                            <input type="radio" class="sexe-F"  name="sexe" value="f" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f'){echo 'checked';} ?> > F
                        </div>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_sexe)){echo $msg_sexe;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" value="<?php if(isset($_POST['ville'])){echo $_POST['ville'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_ville)){echo $msg_ville;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="cp">Code postal</label>
                        <input type="text" name="cp" id="cp" value="<?php if(isset($_POST['cp'])){echo $_POST['cp'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_cp)){echo $msg_cp;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_adresse)){echo $msg_adresse;} ?>
                    </div>
                </div>
                <div class="clear"></div>
                <input type="submit" name="inscription" value="Valider">
        </div>
    </form>
</div>
 <?php
 include(dirname(__FILE__) . '/../inc/footer.inc.php');
  ?>
