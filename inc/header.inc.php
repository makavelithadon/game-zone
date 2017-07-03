<!DOCTYPE html>
<html>
<head>
  <title>Game Zone - By Gamerz for Gamerz</title>
  <meta charset="utf-8" media="all" />
  <link href="<?php echo RACINE_SITE; ?>css/style.min.css" rel="stylesheet" type="text/css" />
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
</head>

<body>
    <div id="overlay">
    </div>
    <div id="popUpImage">
		<img id="imgPopUp" src="" alt="" />
        <div id="containerClose">
            <div id="close">
                FERMER
            </div>
            <div id="cross">
            </div>
        </div>
        <?php if ($productDetails[0]['image_2'] != null || $productDetails[0]['image_3'] != null) : ?>
        <div id="leftArrow">
        </div>
        <?php endif; ?>
        <?php if ($productDetails[0]['image_2'] != null || $productDetails[0]['image_3'] != null) : ?>
        <div id="rightArrow">
        </div>
        <?php endif; ?>
    </div>
	<div id="popUpPanier">
		<h2>Vous venez de rajouter cet article dans votre panier</h2>
		<div class="l">
			<h3 id="nomProduct"></h3>
			<h4 id="marqueProduct"></h4>
		</div>
		<div id="imageProduct" class="c">

		</div>
		<div class="r">
			<div class="container-link-panier">
				<a id="btnPanier" class="btn-panier">
					Voir mon panier
				</a>
				<a id="btnGo" class="btn-go">
					Poursuivre mes achats
				</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
    <div id="popUpPanierPayment">
        <h2>Validation de votre commande numéro <span></span></h2>
        <h3></h3>
        <h4>Vous allez maintenant être redirigé vers votre panier</h4>
        <h5><span>10</span> secondes</h5>
    </div>
	<div id="popUpDeleteProfil">
        <h2 class="list-users">ATTENTION</h2><br>
        <h2 class="list-users">Vous vous apprêtez à supprimer votre profil</h2>
        <h2 class="list-users">Cette action est irréversible car ceci effacera définitivement votre profil de la base de données GAME Zone...</h2>
        <h2 class="list-users">Etes-vous sûr de vouloir continuer</h2><br>
        <a id="btnNON" class="btn-signup non" href="#">NON, je ne souhaite pas supprimer mon profil</a>
        <a id="btnOUI" class="btn-signup oui" href="#">OUI, je souhaite supprimer mon profil</a>
    </div>
    <div style="font-family: 'Montserrat', sans-serif;color: #3d3d3d;" id="popUpCGV">
        <h2>Conditions Générales de Vente</h2>
        <h3>Les conditions générales de vente et les conditions particulières forment un ensemble qui fait partie intégrante du contrat de vente et dont l’acceptation globale est obligatoire avant la conclusion de toute vente. La demande de réservation entraîne l’adhésion aux présentes conditions de vente et l’acceptation complète et sans réserve de leurs dispositions.</h3>
        <h4>Article 1 Objet</h4>
        <h5>Les conditions générales de ventes décrites ci-après détaillent les droits et obligations de l'entreprise GAME Zone France SA et de ses clients dans le cadre de la vente des marchandises suivantes, jeux-vidéo, consoles de jeux, pc gaming et accessoires relatifs aux produits pré-cités.
        <br>Toute prestation accomplie par la société GAME Zone France SA implique l'adhésion sans réserve de l'acheteur aux présentes conditions générales de vente.</h5>
        <h4>Article 2 Présentation des produits</h4>
        <p>
            Les caractéristiques des produits proposés à la vente sont présentées dans la rubrique " Catalogue " de notre site. Les photographies n'entrent pas dans le champ contractuel. La responsabilité de la société GAME Zone France SA ne peut être engagée si des erreurs s'y sont introduites. Tous les textes et images présentés sur le site de la société GAME Zone France SA sont réservés, pour le monde entier, au titre des droits d'auteur et de propriété intellectuelle; leur reproduction, même partielle, est strictement interdite.
        </p>
        <h4>Article 3 Durée de validité des offres de vente</h4>
        <p>
            Les produits sont proposés à la vente jusqu'à épuisement du stock. En cas de commande d'un produit devenu indisponible, le client sera informé de cette indisponibilité, dans les meilleurs délais, par courrier électronique ou par courrier postal.
        </p>
        <h4>Article 4 Prix des produits</h4>
        <p>
            La rubrique " Catalogue " de notre site indique les prix en euros toutes taxes comprises, hors frais de port. Le montant de la TVA est précisé lors de la sélection d'un produit par le client et les frais de port apparaissent sur l'écran à la fin de la sélection des différents produits par le client.<br>La société GAME Zone France SA se réserve le droit de modifier ses prix à tout moment mais les produits commandés sont facturés au prix en vigueur lors de l'enregistrement de la commande.<br>Les tarifs proposés comprennent les rabais et ristournes que l'entreprise  serait amenée à octroyer compte tenu de ses résultats ou de la prise en charge par l'acheteur de certaines prestations.<br>Aucun escompte ne sera accordé en cas de paiement anticipé.
        </p>
        <h4>Article 5 Commande</h4>
        <p>
            Le client valide sa commande lorsqu'il active le lien " Confirmez votre commande " en bas de la page " Récapitulatif de votre commande " après avoir accepté les présentes conditions de vente. Avant cette validation, il est systématiquement proposé au client de vérifier chacun des éléments de sa commande; il peut ainsi corriger ses erreurs éventuelles.<br>La société GAME Zone France SA confirme la commande par courrier électronique; cette information reprend notamment tous les éléments de la commande et le droit de rétractation du client.<br>Les données enregistrées par la société GAME Zone France SA constituent la preuve de la nature, du contenu et de la date de la commande. Celle-ci est archivée par la société GAME Zone France SA dans les conditions et les délais légaux; le client peut accéder à cet archivage en contactant le service Relations Clients.
        </p>
        <h4>Article 6 Modalités de paiement</h4>

        <p>
            Le règlement des commandes s'effectue par chèque ou carte bancaire.<br>Lors de l'enregistrement de la commande, l'acheteur devra verser un acompte de 10 % du montant global de la facture, le solde devant être payé à réception des marchandises
        </p>
        <h4>Article 7 Délai de rétractation</h4>

        <p>
            L'Acheteur dispose d'un délai de quatorze jours francs, à compter de la réception des produits, pour exercer son droit de rétractation sans avoir à justifier de motifs ni à payer de pénalités, à l'exception, le cas échéant, des frais de retour. Si le délai de quatorze jours vient à expirer un samedi, un dimanche ou un jour férié ou chômé, il est prorogé jusqu'au premier jour ouvrable suivant.<br>En cas d'exercice du droit de rétractation, la société rembourse l'Acheteur de la totalité des sommes versées, dans les meilleurs délais et au plus tard dans les trente jours suivant la date à laquelle ce droit a été exercé.
        </p>
        <h4>Article 8 Retard de paiement (clause applicable aux professionnels)</h4>

        <p>
            En cas de défaut de paiement total ou partiel des marchandises livrées au jour de la réception, l'acheteur doit verser à l'entreprise GAME Zone France SA une pénalité de retard égale à une fois et demi le taux de l'intérêt légal.<br>Le taux de l'intérêt légal retenu est celui en vigueur au jour de la livraison des marchandises.<br>Cette pénalité est calculée sur le montant hors taxes de la somme restant due, et court à compter de la date d'échéance du prix sans qu'aucune mise en demeure préalable ne soit nécessaire.<br>Conformément aux articles 441-6 c. com. et D. 441-5 c. com., tout retard de paiement entraine de plein droit, outre les pénalités de retard, une obligation pour le débiteur de payer une indemnité forfaitaire de 40€ pour frais de recouvrement.<br>Une indemnité complémentaire pourra être réclamée, sur justificatifs, lorsque les frais de recouvrement exposés sont supérieurs au montant de l'indemnité forfaitaire.
        </p>
        <h4>Article 9 Livraison</h4>
        <p>
            Tout produit est livré sans garantie quant aux délais, exception faite des livraisons aux particuliers. La date limite de livraison varie suivant leur adresse. Elle est fixée, pour une adresse en France métropolitaine, au jour du paiement + 8 jours et, pour les autres destinations, au jour du paiement + 1 mois.
        </p>
        <h4>Article 10 Relations clients - Service après-vente</h4>
        <p>
            Pour toute information, question ou réclamation, le client peut s'adresser du lundi au vendredi, de 9 h à 18 h au service Relations Clients de la société
        </p>
        <br><br>
        Adresse: 5 rue des Aubépines<br>
        Tél: 01 02 03 04 05<br>
        Fax: 01 03 04 05 06<br>
        e-mail: adm.adm@gamezone.fr
    </div>
    <div style="font-family: 'Montserrat', sans-serif;color: #3d3d3d;" id="popUpML">
        <h2>Mentions Légales</h2>

<p>
    Le site GAME Zone a été créé par :<br><br>

    Romuald DUCONSEIL<br><br>

    6, Rue LEDRU-ROLLIN<br><br>

    94600 Choisy-le-Roi<br><br>

    Téléphone : 06.46.39.41.19<br><br>

    Mail: romuald.duconseil@hotmail.fr<br><br>

    ou<br><br>

    romuald.duconseil-pro@outlook.fr<br><br>
</p>

<span>Ce site est élaboré dans le cadre d'une soutenance de fin de formation en partenariat avec l'Ifocop de Rungis pour une formation de DIW (Développeur Intégrateur Web). Ce site n'a aucune vocation commerciale, le site GAME Zone est une pure fiction.<br><br>La plupart des images et des textes présents sur le site ne sont pas libres de droit et sont tirées pour la plupart de sites déja existants. Si vous reconnaissez une image ou un texte ou partie de texte vous appartenant et que vous désirez que ceux-ci soient retirés, merci de me le faire savoir en utilisant une des deux adresse mail indiquées au-dessus.</span>




<br><br>Le site est édité par :<br>

La SA GAME Zone France au capital de 429 418,00 euros<br>
RCS Paris 403 191 802<br>
Siège social : 1, Avenue Montaigne Paris 75008.<br>
N° de TVA intracommunautaire : FR 65 403 191 802<br>
Gérant : Mr IMAGINAIRE<br>
Le directeur de la publication est Romuald DUCONSEIL<br>
Le site bluebearproduction.com/game_zone est hébergé par phpnet<br><br>

<p>
    Ce site respecte le droit d'auteur. Tous les droits des auteurs des Oeuvres protégées reproduites et communiquées sur ce site, sont réservés.
    Sauf autorisation, toute utilisation des Oeuvres autres que la reproduction et la consultation individuelles et privées sont interdites.
    Le site internet édité par GAME Zone à fait l'objet d'une déclaration à la CNIL sous le numéro suivant 878453
    GAME_ZONE consent à l''utilisateur le droit de consultation desdits sites pour son usage strictement personnel et privé.
    Toute reproduction, rediffusion ou commercialisation totale ou partielle du contenu est interdite.
</p>

<p>
    Traitement des données personnelles : nos engagements
    Vous trouverez ci-dessous notre politique en matière de traitement des données personnelles.
    Ce texte a pour but de vous informer sur la manière dont nous utilisons ces données et vous indique la façon de procéder si vous souhaitez y apporter une modification.
</p>

<h3>1/ Nature des données personnelles recueillies</h3>

<p>
    Les informations que nous sommes amenées à recueillir proviennent :<br>
    - Soit de l'enregistrement volontaire d'une adresse e-mail vous permettant de recevoir l'une de nos newsletters.<br>
    - Soit de la saisie complète de vos coordonnées dans notre boutique en ligne (nom, prénom, société, adresse de facturation et de livraison, numéro de téléphone, adresse e-mail) de manière à pouvoir traiter votre commande.
</p>

<h3>2/ Que faisons-nous de ces données ?</h3>

<p>
    Les informations que vous nous communiquez ne sont jamais confiées à des tiers. Selon les cas, les usages sont les suivants:
    - Si vous vous êtes abonnés à l'une de nos newsletters.
    Dans ce cas, votre adresse mail est strictement utilisée pour l'envoi de nos mailing listes et d'annonces internes.
    Nous n'utilisons jamais vos contacts en vue de l'envoi de messages d'éventuels partenaires commerciaux.
    Par ailleurs, vous pouvez à tout moment vous désabonner de notre newsletter en cliquant sur la mention "Lien de désabonnement" qui figure sur chacune de nos newsletters.
    Ou, en cas d'incident, passer par notre procédure de désabonnement : cliquer ici.
    - Si vous avez répondu à une enquête et laissé vos coordonnées en vue de recevoir l'une de nos publications professionnelles.
    Dans ce cas, nous pouvons éventuellement être amenés à vous transmettre des messages d'autres partenaires.
    Toutefois vos coordonnées ne sont jamais communiquées à l'extérieur: nous effectuons nous mêmes les envois.
    Cependant, vous pouvez vous opposer à ce que vos coordonnées soient utilisées pour l'envoi de messages de ce type en cochant la case prévue à cet effet
    sur la page où nous vous demandons d'indiquer vos coordonnées.
    Si vous avez accepté de recevoir des messages de tiers, vous pouvez nous signaler que vous ne souhaitez plus en recevoir soit en cliquant sur la mention "ne plus recevoir d'information"
    ou passer par notre procédure de désabonnement : cliquer ici.
    Conformément à la loi Informatique et Libertés en date du 6 janvier 1978, vous disposez par ailleurs d'un droit d'accès, de rectification,
    de modification et de suppression concernant les données qui vous concernent. Vous pouvez exercer ce droit en consultant notre page contact/données personnelles.
</p>

<h3>3/ Cookies</h3>

<p>
    Afin d'optimiser l'usage de ses services en ligne, Benchmark Group se réserve le droit de placer des cookies sur les ordinateurs des utilisateurs de ses sites.
    Ces cookies sont notamment utilisés pour faciliter l'accès des utilisateurs à leurs comptes ainsi que pour afficher des bandeaux publicitaires adaptés à leur manière de naviguer sur internet.
    Ces cookies peuvent être délivrés par GAME Zone ou par des entreprises tierces.
    Pour savoir comment refuser, supprimer ces "Cookies" ou être prévenu de leur réception par un message, veuillez consulter la rubrique d'aide de votre navigateur internet.
</p>
    </div>
  <header id="header">

    <div id="headerMainBlock">
	<div class="header-h">

	</div>
        <div class="header-l">
            <h1><a href="/game_zone/accueil">GAME
              <br>
              <span>ZONE</span></a>
            </h1>
        </div>
    <div class="header-c">
