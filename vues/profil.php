<?php
include(dirname(__FILE__) . '/../inc/header.inc.php');
include(dirname(__FILE__) . '/../inc/nav.inc.php');
include(dirname(__FILE__) . '/../inc/section.inc.php');
//var_dump($tabUpdate);
//var_dump(updateMembre ($_SESSION['utilisateur']['id_membre'], $tabUpdate));
//var_dump($_SESSION['utilisateur']);
 ?>
<h2 class="block-titre-principal">Profil de <?php echo $_SESSION['utilisateur']['pseudo']; ?></h2>
<div class="block main-block">
<?php if (isset($_GET['action']) && $_GET['action'] == 'modification') : ?>
    <form class="form form-profil" action="" method="post">
        <div class="form-container">
                <div class="form-container-l">
                    <div class="form-container-block">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){echo $_POST['pseudo'];}else{echo $_SESSION['utilisateur']['pseudo'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_pseudo)){echo $msg_pseudo;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="pass">Mot de passe</label>
                        <input type="password" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>" >
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_pass)){echo $msg_pass;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="confirmPass">Confirmation</label>
                        <input type="password" name="confirm_pass" id="confirmPass" value="<?php if(isset($passwords_ok)){echo $_POST['pass'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_confirm_pass)){echo $msg_confirm_pass;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom']) && !empty($_POST['nom'])){echo $_POST['nom'];}else{echo $_SESSION['utilisateur']['nom'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_nom)){echo $msg_nom;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom']) && !empty($_POST['prenom'])){echo $_POST['prenom'];}else{echo $_SESSION['utilisateur']['prenom'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_prenom)){echo $msg_prenom;} ?>
                    </div>
                </div>
                <div class="form-container-r">
                    <div class="form-container-block">
                        <label for="mail">E-mail</label>
                        <input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail']) && !empty($_POST['mail'])){echo $_POST['mail'];}else{echo $_SESSION['utilisateur']['mail'];} ?>" placeholder="Required" required>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_mail)){echo $msg_mail;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="sexe">Sexe</label>
                        <div class="sexe">
                            <input type="radio" class="sexe-M" name="sexe" value="m" <?php if((isset($_POST['sexe']) && $_POST['sexe'] == 'm') || $_SESSION['utilisateur']['sexe'] == 'm'){echo 'checked';} ?> > M
                            <input type="radio" class="sexe-F"  name="sexe" value="f" <?php if((isset($_POST['sexe']) && $_POST['sexe'] == 'f') || $_SESSION['utilisateur']['sexe'] == 'f'){echo 'checked';} ?> > F
                        </div>
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_sexe)){echo $msg_sexe;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" value="<?php if(isset($_POST['ville']) && !empty($_POST['ville'])){echo $_POST['ville'];}else{echo $_SESSION['utilisateur']['ville'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_ville)){echo $msg_ville;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="cp">Code postal</label>
                        <input type="text" name="cp" id="cp" value="<?php if(isset($_POST['cp']) && !empty($_POST['cp'])){echo $_POST['cp'];}else{echo $_SESSION['utilisateur']['cp'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_cp)){echo $msg_cp;} ?>
                    </div>
                    <div class="form-container-block">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" value="<?php if(isset($_POST['adresse']) && !empty($_POST['adresse'])){echo $_POST['adresse'];}else{echo $_SESSION['utilisateur']['adresse'];} ?>">
                    </div>
                    <div class="error-msg">
                        <?php if(isset($msg_adresse)){echo $msg_adresse;} ?>
                    </div>
                </div>
                <div class="clear"></div>
                <input type="submit" name="submit" value="Modifier">
        </div>
    </form>
<?php elseif (!empty($tabLigne)) : ?>
    <?php //var_dump($tabLigne); ?>
    <?php
        echo '<h2 style="color: #3d3d3d; text-align: center; font-family: \'Montserrat\', sans-serif;">Commande numéro ' . $_GET['num_commande'] . '</h2>';
        echo '<table class="table profil" border=1 style="border-collapse: collapse;font-size: .8em;">';
            $i = 0;
            $keys = array_keys($tabLigne[0]);
            echo '<tr>';
            foreach ($keys AS $val) {
                if ($val == 'image_1') {
                    echo '<th>' . ucfirst('visuel') . '</th>';
                }
                else if ($val == 'prix_unitaire') {
                    echo '<th>' . ucfirst('prix unitaire') . '</th>';
                }
                else {
                    echo '<th>' . ucfirst($val) . '</th>';
                }
                if ($i == count($keys) - 1) {
                    echo '<th>' . ucfirst('prix total') . '</th>';
                }
                $i++;
            }
            echo '</tr>';
            foreach ($tabLigne AS $k => $v) {
                $i = 0;
                echo '<tr>';
                foreach ($v AS $k2 => $v2) {
                    if ($k2 == 'image_1') {
                        echo '<td style="background: url(' . $v2 . ') no-repeat center 50% / 65%;"></td>';
                    }
                    else if ($k2 == 'nom') {
                        echo '<td style="font-size: .85em;">' . $v2 . '</td>';
                    }
                    else {
                        echo '<td>' . $v2 . '</td>';
                    }
                }
                if ($i == count($v2) - 1) {
                    echo '<td>' . ($v['prix_unitaire'] * $v['quantite']) . '€</td>';
                }
                $i++;
                echo '</tr>';
            }
            echo '</table>';
     ?>
<?php else : ?>
    <div class="block-profil">

        <div class="profil-l">
            <?php foreach ($_SESSION['utilisateur'] AS $k => $v) : ?>
                <?php if ($k != 'id_membre') : ?>
                    <h2 style="color:#0085b2;"><?php echo ucfirst($k); ?></h2>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="profil-r">
            <?php foreach ($_SESSION['utilisateur'] AS $k => $v) : ?>
                <?php if ($k != 'id_membre') : ?>
                    <?php if ($k == 'statut') : ?>
                        <?php if ($v == 0) : ?>
                            <h2>Utilisateur</h2>
                        <?php else : ?>
                            <h2 style="color: rgb(255,0,0)">Administrateur</h2>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($k == 'mail') : ?>
                            <h2 style="color: #ffa500;"><?php echo $v; ?></h2>
                        <?php else : ?>
                            <h2><?php echo ucfirst($v); ?></h2>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="clear"></div>
    </div>
    <a class="btn-signup modif" href="/game_zone/profil/modification">Modification</a>
	<form id="formTrashProfil" class="" action="" method="post">
        <input type="hidden" id="IDTrashProfil" name="IDTrashProfil" value="<?php echo $_SESSION['utilisateur']['id_membre']; ?>" />
        <input class="btn-signup delete" name="trashProfil" type="submit" id="trashProfil" value="Suppression"/>
    </form>
    <?php if ($resCommandes) : ?>
    <div class="">
        <?php
            echo '<table class="table profil" border=1 style="border-collapse: collapse;">';
    			echo '<tr>';
    			for($i = 0; $i < $resCommandes->columnCount();$i++)
    			{
    				$meta = $resCommandes->getColumnMeta($i);
    				echo '<th>' . ucfirst($meta['name']) . '</th>';
    			}
    			echo '</tr>';
    			while($commande = $resCommandes->fetch(PDO::FETCH_OBJ))
    			{
    				echo '<tr>';
    				foreach($commande AS $key => $val)
    				{
    					if($key == 'Facture')
    					{
    						echo '<td style="color: #ffa500;">' . $val . ' €</td>';
    					}
                        elseif ($key == 'Numéro de suivi') {
                            echo '<td><a style="text-decoration: none; color: #0085b2;" href="/game_zone/profil/detail-commande/' . $val . '">' . $val . '</a></td>';
                        }
    					else
    					{
    						echo '<td>' . $val . '</td>';
    					}
    				}
    				echo '</tr>';
    			}
    			echo '</table>';
         ?>
    </div>
<?php endif; ?>
<?php endif; ?>
</div>
 <?php
 include(dirname(__FILE__) . '/../inc/footer.inc.php');
  ?>
