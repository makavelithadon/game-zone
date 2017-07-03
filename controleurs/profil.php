<?php
if (!userEstConnecte()) {
    header('location:' . RACINE_SITE . 'accueil');
    exit();
}

include(dirname(__FILE__) . '/../modeles/profil.php');

$msg = '';
$msg_pseudo = '';
$msg_password = '';
$msg_nom = '';
$msg_prenom = '';
$msg_mail = '';
$msg_ville = '';
$msg_cp = '';
$msg_adresse = '';
$msg_password_confirm = '';

if(isset($_POST['submit']) && $_POST['submit'] == 'Modifier')
{
    if ($_POST) {
        $tabUpdate = array();
        if ($_POST['pseudo']) {
            if(!regExpPseudo($_POST['pseudo'])){
                $msg_pseudo = 'Le pseudo ne doit contenir que des caractères alphanumériques';
                $msg .= 'Le pseudo ne doit contenir que des caractères alphanumériques';
            }
            elseif(!pseudoLength($_POST['pseudo']))
            {
                $msg_pseudo = 'Votre pseudo doit contenir entre 6 et 15 caractères';
                $msg .= 'Votre pseudo doit contenir entre 6 et 15 caractères';
            }
            elseif (pseudoExists ($_POST['pseudo']) && pseudoExists ($_POST['pseudo']) != $_SESSION['utilisateur']['id_membre']) {
                $msg_pseudo = 'Ce pseudo est déja utilisé par un autre utilisateur';
                $msg .= 'Ce pseudo est déja utilisé par un autre utilisateur';
            }
            else {
                $pseudo = strip_tags(htmlentities($_POST['pseudo'], ENT_QUOTES));
                $tabUpdate ['pseudo'] = $pseudo;
            }
        }
        else {
            $msg_pseudo = 'Le pseudo doit être renseigné';
            $msg .= 'Le pseudo doit être renseigné';
        }
        if($_POST['pass']){
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
                    $pass = password_hash(strip_tags(htmlentities($_POST['pass'], ENT_QUOTES)), PASSWORD_DEFAULT);
                    $tabUpdate ['mdp'] = $pass;
                }
            }
        }
        if($_POST['nom'])
        {
            if(!regExpNom($_POST['nom']))
            {
                $msg .= 'Votre nom ne doit pas contenir de caractères spéciaux';
                $msg_nom = 'Votre nom ne doit pas contenir de caractères spéciaux';
            }
            elseif (!nomLength($_POST['nom'])) {
                $msg .= 'Votre nom doit contenir au moins 2 caractères';
                $msg_nom = 'Votre nom doit contenir au moins 2 caractères';
            }
            else {
                $nom = strip_tags(htmlentities($_POST['nom'], ENT_QUOTES));
                $tabUpdate ['nom'] = $nom;
            }
        }
        else {
            $msg_nom = 'Vous devez renseigner votre nom';
            $msg .= 'Vous devez renseigner votre nom';
        }
        if($_POST['prenom'])
        {
            if(!regExpNom($_POST['prenom']))
            {
                $msg .= 'Votre prénom ne doit pas contenir de caractères spéciaux';
                $msg_prenom = 'Votre prénom ne doit pas contenir de caractères spéciaux';
            }
            elseif (!nomLength($_POST['prenom'])) {
                $msg .= 'Votre prénom doit contenir au moins 2 caractères';
                $msg_prenom = 'Votre prénom doit contenir au moins 2 caractères';
            }
            else {
                $prenom = strip_tags(htmlentities($_POST['prenom'], ENT_QUOTES));
                $tabUpdate ['prenom'] = $prenom;
            }
        }
        else {
            $msg_prenom = 'Vous devez renseigner votre prénom';
            $msg .= 'Vous devez renseigner votre prénom';
        }
        if ($_POST['mail']) {
            if(!regExpMail($_POST['mail']))
            {
                $msg .= 'L\'adresse mail n\est pas valide';
                $msg_mail = 'L\'adresse mail n\est pas valide';
            }
            elseif (mailExists ($_POST['mail']) && mailExists ($_POST['mail']) != $_SESSION['utilisateur']['id_membre']) {
                $msg_mail = 'Cet email est déja utilisé par un autre utilisateur';
                $msg .= 'Cet email est déja utilisé par un autre utilisateur';
            }
            else {
                $mail = strip_tags(htmlentities($_POST['mail'], ENT_QUOTES));
                $tabUpdate ['mail'] = $mail;
            }
        }
        else {
            $msg_mail = 'L\adresse mail doit être renseignée';
            $msg .= 'L\adresse mail doit être renseignée';
        }
        if($_POST['sexe'])
        {
            $sexe = $_POST['sexe'];
            $tabUpdate ['sexe'] = $sexe;
        }
        if($_POST['ville'])
        {
            if(!regExpPseudo($_POST['ville']))
            {
                $msg .= 'Votre ville ne doit pas contenir de caractères spéciaux';
                $msg_ville = 'Votre ville ne doit pas contenir de caractères spéciaux';
            }
            else {
                $ville = strip_tags(htmlentities($_POST['ville'], ENT_QUOTES));
                $tabUpdate ['ville'] = $ville;
            }
        }
        else {
            $msg_ville = 'Vous devez renseigner votre ville de résidence';
            $msg .= 'Vous devez renseigner votre ville de résidence';
        }
        if($_POST['cp'])
        {
            if(!regExpCp ($_POST['cp']) || $_POST['cp'] < 01000)
            {
                $msg .= 'Votre code postal doit contenir 5 chiffres';
                $msg_cp = 'Votre code postal doit contenir 5 chiffres';
            }
            else {
                $cp = strip_tags(htmlentities($_POST['cp'], ENT_QUOTES));
                $tabUpdate ['cp'] = $cp;
            }
        }
        else {
            $msg_cp = 'Vous devez renseigner votre code postal';
            $msg .= 'Vous devez renseigner votre code postal';
        }
        if($_POST['adresse'])
        {
            $adresse = strip_tags(htmlentities($_POST['adresse'], ENT_QUOTES));
            $tabUpdate ['adresse'] = $adresse;
        }
        else {
            $msg_adresse = 'Vous devez renseigner votre adresse postale';
            $msg .= 'Vous devez renseigner votre adresse postale';
        }
        if (empty($msg)) {
            updateMembre ($_SESSION['utilisateur']['id_membre'], $tabUpdate);
            setNewSession ($_SESSION['utilisateur']['id_membre']);
            header('location:/game_zone/profil');
        }
    }
}

$resCommandes = getCommandes ($_SESSION['utilisateur']['id_membre']);

if (isset($_GET['action']) && $_GET['action'] == 'detail-commande' && isset($_GET['num_commande'])) {
    $getDetailsCommande = getDetailsCommande ($_GET['num_commande'], $_SESSION['utilisateur']['id_membre']);
    if (!empty($getDetailsCommande)) {
        $tabLigne = array();
        while ($ligne = $getDetailsCommande->fetch(PDO::FETCH_ASSOC)) {
            $tabLigne [] = $ligne;
        }
        if (empty($tabLigne)) {
            header('location:/game_zone/profil');
        }
    }
}

include(dirname(__FILE__) . '/../vues/profil.php');

?>
