<?php

include(dirname(__FILE__) . '/../modeles/contact.php');

$msg = '';
$msg_expediteur = '';
$msg_sujet = '';
$msg_message = '';

if (isset($_POST['submitContact'])) {
    if ($_POST['expediteur']) {
        $expediteur = strip_tags(htmlentities($_POST['expediteur'], ENT_QUOTES));
    }
    else {
        $msg_expediteur = 'Vous devez renseigner une adresse e-mail';
        $msg .= 'Vous devez renseigner une adresse e-mail';
    }
    if ($_POST['sujet']) {
        $sujet = strip_tags(htmlentities($_POST['sujet'], ENT_QUOTES));
    }
    else {
        $msg_sujet = 'Vous devez indiquer le sujet de votre requête';
        $msg .= 'Vous devez indiquer le sujet de votre requête';
    }
    if ($_POST['message']) {
        $message = strip_tags(htmlentities($_POST['message'], ENT_QUOTES));
    }
    else {
        $msg_message = 'Vous devez écrire un message concernant votre demande';
        $msg .= 'Vous devez écrire un message concernant votre demande';
    }
    if (empty($msg)) {
        $to = 'romuald.duconseil@hotmail.fr';
        $prenom = 'Romuald';
        $nom = 'DUCONSEIL';
        include('class.phpmailer.php');
		$mail = new PHPmailer();
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->From= $expediteur;
        if (userEstConnecte()) {
            $mail->FromName= $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'];
        }
        else {
            $pos = strpos($expediteur, '.');
            $prename = substr($expediteur, 0, $pos);
            $str = strchr($expediteur, '.');
            $pos2 = strpos($str, '@');
            $name = substr($str, 1, ($pos2 - 1));
            $mail->FromName= ucfirst($prename) . ' ' . ucfirst($name);
        }
		$mail->AddAddress($to, $prenom . $nom);
        $mail->AddReplyTo($expediteur);
		$mail->Subject= $sujet;
		$mail->Body = $message;

        if(!$mail->Send()){
          echo $mail->ErrorInfo;
        }
        else{

          $_SESSION['message_envoye'] = true;
          header('location:/game_zone/message-send');
        }
        unset($mail);
    }
}

include(dirname(__FILE__) . '/../vues/contact.php');

?>
