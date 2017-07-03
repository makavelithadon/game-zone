<?php
if (userEstConnecte()) {
    header('location:/game_zone/accueil');
    exit();
}
include(dirname(__FILE__) . '/../modeles/connexion.php');

$msg_pseudo = '';
$msg_pass = '';
$msg = '';


if ($_POST) {
    if ($_POST['pseudo']) {
        $pseudo = strip_tags(htmlentities($_POST['pseudo'], ENT_QUOTES));
    }
    else {
        $msg_pseudo = 'Le pseudo n\'est renseigné';
        $msg .= 'Le pseudo n\'est pas renseigné';
    }
    if($_POST['pass']){
        $pass = $_POST['pass'];
    }
    else {
        $msg_pass = 'Le mot de passe n\'est pas renseigné';
        $msg .= 'Le mot de passe n\'est pas renseigné';
    }
    if (empty($msg)) {
        if ($userExists = connexionUser($pseudo)) {
            $res = $userExists->fetch(PDO::FETCH_OBJ);
            if (password_verify($pass, $res->mdp)) {
                foreach ($res AS $key => $val)  {
                    if ($key != 'mdp') {
                        $_SESSION['utilisateur'] [$key] = $val;
                    }
                }
                header('location:/game_zone/accueil');
                exit();
            }
			else {
				$msg_pass = 'Le mot de passe n\'est pas valide';
				$msg .= 'Le mot de passe n\'est pas valide';
			}
        }
        else {
            $msg_pseudo = 'Ce pseudo n\'existe pas';
        }
    }
}
include(dirname(__FILE__) . '/../vues/connexion.php');

?>

