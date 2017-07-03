<?php

if (!userEstConnecteEtEstAdmin ()) {
    header('location:/game_zone/accueil');
    exit();
}

include(RACINE_SERVER . RACINE_SITE . 'admin/modeles/envoi-newsletter.php');

if (isset($_POST['submitNewsletter'])) {
    include(RACINE_SERVER . RACINE_SITE . 'controleurs/class.phpmailer.php');

    $tabAllFromNewsLetter = getAllFromNewsLetter();

    foreach ($tabAllFromNewsLetter AS $k => $v) {
        $to = $v['mail'];
        $prenom = $v['prenom'];
        $nom = $v['nom'];

        $mail = new PHPmailer();
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->From='adm.adm@gamezone.fr';
        $mail->FromName='Administrateur Game ZONE FRANCE S.A';
        $mail->AddAddress($to, $prenom . $nom);
        $mail->AddReplyTo('adm.adm@gamezone.fr');
        $mail->Subject='Du nouveau dans la GAME Zone';
        $mail->Body = '<table width=100% cellpadding=0 cellspacing=0 border=0 style="background-color: #323844;">';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td height=40>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td align=center>';
        $mail->Body .= '<table cellpadding=0 cellspacing=0 border=0 width=800 style="background-color: #ffffff;">';
        $mail->Body .= '<tr style="background-color: #0085B2;border-bottom-width: 1px; border-bottom-color: #3d3d3d;border-bottom-style:solid;">';
        $mail->Body .= '<th>';
        $mail->Body .= '<table cellpadding=0 cellspacing=0 border=0>';
        $mail->Body .= '<tr valign=middle>';
        $mail->Body .= '<td height=60 width=800 valign=middle align=center style="vertical-align: middle;">';
        $mail->Body .= '<h2 style="font-weight: lighter;font-family: Calibri, Arial, sans-serif; color: #ffffff;line-height: 58px;">Du nouveau dans la <span style="font-size: 1.2em;font-weight: bold;">GAME Zone !</span></h2>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '</table>';
        $mail->Body .= '</th>';
        $mail->Body .= '</tr>';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td height=200 style="background-color: #ffffff;">';
        $mail->Body .= '<table cellpadding=0 cellspacing=0 border=0>';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td width=250 height=200 vertical-align: middle style="display: block;">';
        $mail->Body .= '<img height=200 style="display: block;vertical-align: middle;"';
        $mail->Body .= 'src="http://www.bluebearproduction.com/game_zone/img/tomb-raider-definitive-edition-xbox-one-xbox-oneimage-3-bis.png" alt="" />';
        $mail->Body .= '</td>';
        $mail->Body .= '<td width=550 height=200 style="vertical-align: middle;" cellpadding=15>';
        $mail->Body .= '<h3 style="text-align: center; font-family: Calibri, Arial, sans-serif; font-weight: lighter; color:';
        $mail->Body .= '#3d3d3d;margin-bottom:10px;">Chèr(e) <span style="color: #0085b2; font-size: 1.1em;font-weight:';
        $mail->Body .= 'bold;">' . $v['pseudo'] . '</span>, il y a du nouveau sur ton site préféré !</h3>';
        $mail->Body .= '<h4 style="text-align: center; font-family: Calibri, Arial, sans-serif; font-weight: lighter; color:';
        $mail->Body .= '#3d3d3d;">De nouveaux produits viennent d\'arriver dans nos stocks, rien que pour toi...Alors n\'attends plus';
        $mail->Body .= 'et connecte-toi vite jeune <span style="color: #ffa500; font-size: 1em;font-weight: bold;">Gamer</span>';
        $mail->Body .= '!</h4>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '</table>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td style="background-color: #0085b2;border-top-width: 1px; border-top-color: #3d3d3d;border-top-style:solid;" height=200>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '</table>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '<tr>';
        $mail->Body .= '<td height=40>';
        $mail->Body .= '</td>';
        $mail->Body .= '</tr>';
        $mail->Body .= '</table>';


        if(!$mail->Send()){
          echo $mail->ErrorInfo;
        }
        else{
            header('location:/game_zone/admin/envoi-newsletter-success');
        }
        unset($mail);
    }

}



include(RACINE_SERVER . RACINE_SITE . 'admin/vues/envoi-newsletter.php');

?>
