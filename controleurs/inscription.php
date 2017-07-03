<?php

include(dirname(__FILE__) . '/../modeles/inscription.php');

$msg_pseudo = '';
$msg_pass = '';
$msg_confirm_pass = '';
$msg_nom = '';
$msg_prenom = '';
$msg_mail = '';
$msg_sexe = '';
$msg_ville = '';
$msg_cp = '';
$msg_adresse = '';
$msg = '';

/*var_dump($_POST);*/

if ($_POST) {
    if ($_POST['pseudo']) {
        $pseudo = strip_tags(htmlentities($_POST['pseudo'], ENT_QUOTES));
        if (pseudoExists($_POST['pseudo'])) {
            $msg_pseudo = 'Ce pseudo existe déjà';
            $msg .= 'Ce pseudo existe déjà';
        }
        elseif(!regExpPseudo($_POST['pseudo'])){
            $msg_pseudo = 'Le pseudo ne doit contenir que des caractères alphanumériques';
            $msg .= 'Le pseudo ne doit contenir que des caractères alphanumériques';
        }
        elseif(!pseudoLength($_POST['pseudo']))
        {
            $msg_pseudo = 'Votre pseudo doit contenir entre 6 et 15 caractères';
            $msg .= 'Votre pseudo doit contenir entre 6 et 15 caractères';
        }
    }
    else {
        $msg_pseudo = 'Le pseudo doit être renseigné';
        $msg .= 'Le pseudo doit être renseigné';
    }
    if($_POST['pass']){
        $pass = password_hash(strip_tags(htmlentities($_POST['pass'], ENT_QUOTES)), PASSWORD_DEFAULT);
        if (!passLength($_POST['pass'])) {
            $msg_pass = 'Votre mot de passe doit contenir entre 6 et 15 caractères';
            $msg .= 'Votre mot de passe doit contenir entre 6 et 15 caractères';
        }
        else
        {
            $password_1 = true;
            if($_POST['confirm_pass'] != $_POST['pass'])
            {
                $msg .= 'Les mots de passe ne correspondent pas';
                $msg_confirm_pass = 'Les mots de passe ne correspondent pas';
            }
            else
            {
                $passwords_ok = true;
            }
        }
    }
    else {
        $msg_pass = 'Le mot de passe doit être renseigné';
        $msg .= 'Le mot de passe doit être renseigné';
    }
    if($_POST['nom'])
    {
        $nom = strip_tags(htmlentities($_POST['nom'], ENT_QUOTES));
        if(!regExpNom($_POST['nom']))
        {
            $msg .= 'Votre nom ne doit pas contenir de caractères spéciaux';
            $msg_nom = 'Votre nom ne doit pas contenir de caractères spéciaux';
        }
        elseif (!nomLength($_POST['nom'])) {
            $msg .= 'Votre nom doit contenir au moins 2 caractères';
            $msg_nom = 'Votre nom doit contenir au moins 2 caractères';
        }
    }
    else {
        $nom = '';
    }
    if($_POST['prenom'])
    {
        $prenom = strip_tags(htmlentities($_POST['prenom'], ENT_QUOTES));
        if(!regExpNom($_POST['prenom']))
        {
            $msg .= 'Votre prénom ne doit pas contenir de caractères spéciaux';
            $msg_prenom = 'Votre prénom ne doit pas contenir de caractères spéciaux';
        }
        elseif (!nomLength($_POST['prenom'])) {
            $msg .= 'Votre prénom doit contenir au moins 2 caractères';
            $msg_prenom = 'Votre prénom doit contenir au moins 2 caractères';
        }
    }
    else {
        $prenom = '';
    }
    if ($_POST['mail']) {
        $mail = strip_tags(htmlentities($_POST['mail'], ENT_QUOTES));
        if (mailExists($_POST['mail'])) {
            $msg .= 'Cette adresse mail existe déja !';
            $msg_mail = 'Cette adresse mail existe déja !';
        }
        elseif(!regExpMail($_POST['mail']))
        {
            $msg .= 'L\'adresse mail n\est pas valide';
            $msg_mail = 'L\'adresse mail n\est pas valide';
        }
    }
    else {
        $msg_mail = 'L\adresse mail doit être renseignée';
        $msg .= 'L\adresse mail doit être renseignée';
    }
    if($_POST['sexe'])
    {
        $sexe = $_POST['sexe'];
    }
    if($_POST['ville'])
    {
        $ville = strip_tags(htmlentities($_POST['ville'], ENT_QUOTES));
        if(!regExpPseudo($_POST['ville']))
        {
            $msg .= 'Votre ville ne doit pas contenir de caractères spéciaux';
            $msg_ville = 'Votre ville ne doit pas contenir de caractères spéciaux';
        }
    }
    else {
        $ville = '';
    }
    if($_POST['cp'])
    {
        $cp = strip_tags(htmlentities($_POST['cp'], ENT_QUOTES));

        if(!regExpCp ($cp) || $_POST['cp'] < 01000)
        {
            $msg .= 'Votre code postal doit contenir 5 chiffres';
            $msg_cp = 'Votre code postal doit contenir 5 chiffres';
        }
    }
    else {
        $cp = '';
    }
    if($_POST['adresse'])
    {
        $adresse = strip_tags(htmlentities($_POST['adresse'], ENT_QUOTES));
    }
    else {
        $adresse = '';
    }
    if (empty($msg)) {
        inscrireMembre($pseudo, $pass, $nom, $prenom, $mail, $sexe, $ville, $cp, $adresse);
		$to = $mail;
		include('class.phpmailer.php');
		$mail = new PHPmailer(); 
        $mail->IsHTML(true); 
        $mail->CharSet = 'UTF-8'; 
        $mail->From='adm.adm@gamezone.fr';
        $mail->FromName='Administrateur Game ZONE FRANCE S.A';
		$mail->AddAddress($to, $prenom . $nom); 
        $mail->AddReplyTo('adm.adm@gamezone.fr');
		$mail->Subject='Votre inscription sur Game ZONE France'; 
		$mail->Body = '<div style="width: 800px; height: 200px;background: #323844;';
		$mail->Body .= 'margin: 0 auto;margin-top:40px;">';
        $mail->Body .= '<div style="width: 200px;;box-sizing: border-box;float:';
		$mail->Body .= 'left;margin-left: 34px';
		$mail->Body .= 'height: 100px;font-family: Calibri;color: #fff;';
		$mail->Body .= 'font-size: .9em;padding-top: 4px;">';
		$mail->Body .= '<h1 style="text-align:center;"><a href=';
		$mail->Body .= '"http://www.bluebearproduction.com/game_zone/accueil"';
		$mail->Body .= ' style="color: #fff;';
		$mail->Body .= 'text-decoration: none;">GAME';
		$mail->Body .= '<br><span style="font-family: Calibri;font-size: .65em';
		$mail->Body .= 'padding-left: 5px;">ZONE</span></a>';
		$mail->Body .= '</h1></div><div style="float: left;width: 564px;';
		$mail->Body .= 'height: 100px;">';
		$mail->Body .= '<p style="text-align: center; color: #fff; ';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'Bienvenue sur Game Zone FRANCE, ' . $pseudo . '</p><br><br>';
		$mail->Body .= '<p style="text-align: center; color: #fff;';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'Vous faites maintenant partie de nos membres et ';
		$mail->Body .= 'nous vous en remercions,';
		$mail->Body .= 'vous pouvez désormais passer commande à tout moment !</p>';	
		$mail->Body .= '<p style="text-align: center; color: #fff; ';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'A bientôt sur Game Zone FRANCE !</p></div></div>';
         
 
        if(!$mail->Send()){ 
          echo $mail->ErrorInfo;  
        }
        else{      
		  
          echo '<div class="success"> Votre inscription a bien été validée</div>';
        }
        unset($mail);
		$_SESSION['last_inscrit'] = $pseudo;
        header('location:/game_zone/inscription-success');
    }
}

include(dirname(__FILE__) . '/../vues/inscription.php');

?>
