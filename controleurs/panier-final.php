<?php
include(dirname(__FILE__) . '/../modeles/panier.php');

if (!isset($_SESSION['panier']) || empty($_SESSION['panier']['id_article'][0])) {
    header('location:' . RACINE_SITE . 'panier');
    exit();
}

$c = count($_SESSION['panier']['id_article']);
$total = 0;
if (isset($_POST['submitPayment'])) {
    var_dump($_POST);
    $retour = array();
    if(!isset($_POST['cgv']))
	{
		$msg_cgv = 'Vous devez accepter les Conditions Générales de Vente avant de pouvoir procéder au paiement de vos achats';
	}
    else {
        for($i=0; $i < $c; $i++) {
    		$req = "SELECT * FROM article WHERE id_article = :id_article"; // on récupère les informations de l'article en BDD grace à son id
    		$r = $bdd->prepare($req);
            $r->execute(array('id_article' => $_SESSION['panier']['id_article'][$i]));
            while ($l = $r->fetch(PDO::FETCH_ASSOC)) {
                $retour ["quantite_dans_le_panier$i"] = $_SESSION['panier']['quantite'][$i];
                $retour ["quantite_restantes$i"] = $l['quantite'];
                if ($_SESSION['panier']['quantite'][$i] > $l['quantite']) {
                    $retour ["message_$i"] = '<span style="position:relative;">La quantité de l\'article ' . $_SESSION['panier']['nom'][$i] . ' a été réduite à ' . $l['quantite'] . ' car notre stock est insuffisant, merci de <a href="/game_zone/panier" class="move-link" style="color: #0085b2">vérifier vos achats</a></span>';
                    $_SESSION['panier']['quantite'][$i] = $l['quantite'];
                    $ok = false;
                }
                else {
                    $ok = true;
                }
            }
        }
    }
    $qte = 0;
    foreach ($_SESSION['panier']['quantite'] AS $val) {
        $qte += $val;
    }
    $retour ['quantite_totale_panier'] = $qte;
    if (isset($ok) && $ok === true) {
        for ($i = 0; $i < $c; $i++) {
            $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
        }
        $reqInsert = "INSERT INTO commande (id_commande, montant, date, id_membre) VALUES (NULL, :total, NOW(), :id_membre)";
        $insert = $bdd->prepare($reqInsert);
        $insert->execute(array('total' => number_format($total, 2, '.', ''), 'id_membre' => $_SESSION['utilisateur']['id_membre']));
        $req = "SELECT MAX(id_commande) AS 'last_id_commande' FROM commande WHERE id_membre = :id_membre";
        $recupLastInsertId = $bdd->prepare($req);
        $recupLastInsertId->execute(array('id_membre' => $_SESSION['utilisateur']['id_membre']));
        $ligne = $recupLastInsertId->fetch(PDO::FETCH_ASSOC);
        $lastIdCommande = $ligne['last_id_commande'];
        for($i = 0 ; $i < $c; $i++)
		{
			$reqInsert = "INSERT INTO details_commande (id_details_commande, id_commande, id_article, quantite) VALUES (NULL, :id_commande, :id_article, :quantite)";
			$insert = $bdd->prepare($reqInsert);
            $insert->execute(array('id_commande' => $lastIdCommande, 'id_article' => $_SESSION['panier']['id_article'][$i], 'quantite' => $_SESSION['panier']['quantite'][$i]));
            $reqDecremente = "UPDATE article SET quantite = quantite - :quantite WHERE id_article = :id_article";
            $updateQte = $bdd->prepare($reqDecremente);
            $updateQte->execute(array('quantite' => $_SESSION['panier']['quantite'][$i], 'id_article' => $_SESSION['panier']['id_article'][$i]));
		}
		$to = $_SESSION['utilisateur']['mail'];
		$pseudo = $_SESSION['utilisateur']['pseudo'];
		$prenom = $_SESSION['utilisateur']['prenom'];
		$nom = $_SESSION['utilisateur']['nom'];

		include('class.phpmailer.php');

		$mail = new PHPmailer();
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->From='adm.adm@gamezone.fr';
        $mail->FromName='Administrateur Game ZONE FRANCE S.A';
		$mail->AddAddress($to, $prenom . $nom);
        $mail->AddReplyTo('adm.adm@gamezone.fr');
		$mail->Subject='Validation de votre commande numéro ' . $lastIdCommande;
		$mail->Body = 'Bonjour, ' . $pseudo;
		$mail->Body .= 'Vous venez de passer une commande d\'un montant';
		$mail->Body .= ' de ' . $_SESSION['prix_total'];
        $mail->Body .= 'sur notre site Game Zone FRANCE';
		$mail->Body .= 'et vous en remercions.';
		$mail->Body .= '<br><br>Vous recevrez le contenu de votre commande dans ';
		$mail->Body .= 'un délai de 7 jours.<br><br>Toute l\'équipe';
		$mail->Body .= ' de Game Zone FRANCE vous souhaite bonne';
		$mail->Body .= ' réception et vous dit à bientôt sur Game Zone!';


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
		$mail->Body .= 'Cher client, chère cliente, </p>';
		$mail->Body .= '<p style="text-align: center; color: #fff;';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'Vous venez de passer une commande sur notre site ';
		$mail->Body .= 'd\'un montant de ' . $_SESSION['prix_total'];
		$mail->Body .= '<p style="text-align: center; color: #fff;';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'Vous recevrez votre commande dans un';
		$mail->Body .= ' délai de 7 jours ouvrés</p>';
		$mail->Body .= '<p style="text-align: center; color: #fff; ';
		$mail->Body .= 'font-family: Calibri;">';
		$mail->Body .= 'A bientôt sur Game Zone FRANCE !</p></div></div>';

		if(!$mail->Send()){
          echo $mail->ErrorInfo;
        }
        else{

          $errorPayment = '<div class="success"> Votre inscription a bien été validée</div>';
        }
        unset($mail);

        unset($_SESSION['panier']);
        $retour['msg_transaction_terminee'] = 'Votre commande d\'un montant total de <span style="color: #0085b2">' . $_SESSION['prix_total'] . '</span> a été validée, un mail récapitulatif va vous être envoyé dans quelques instants. Toute l\'équipe de <span style="color: #0085b2;">Game Zone FRANCE</span> vous souhaite une bonne réception de vos articles et vous remercie de votre confiance.<br>A bientôt sur <span style="color: #0085b2;">Game Zone FRANCE</span> avec toujours plus de bons plans! ';
        $retour ['num_commande'] = $lastIdCommande;
        $_SESSION['payment-ok'] = true;
        header('location:/game_zone/panier-success');
    }
}

include(dirname(__FILE__) . '/../vues/panier-final.php');


?>
