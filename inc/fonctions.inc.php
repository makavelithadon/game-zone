<?php
//  FONCTIONS DE FORMULAIRES //

function regExpPseudo($pseudo) {
    $regExp = preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ._-]+$#', $pseudo);
    return $regExp;
}
function pseudoLength ($pseudo){
    if(mb_strlen($pseudo, 'utf-8') < 6 || mb_strlen($pseudo, 'utf-8') > 15) {
        return false;
    }
    else {
        return true;
    }
}
function passLength ($pass) {
    if(mb_strlen($pass, 'utf-8') < 8 || mb_strlen($pass, 'utf-8') > 20) {
        return false;
    }
    else {
        return true;
    }
}
function regExpnom ($nom) {
    $criteres_nom = preg_match('#^[a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ .\'_-]+$#', $nom);
    return $criteres_nom;
}
function nomLength ($nom) {
    if(mb_strlen($nom, 'utf-8') < 2) {
        return false;
    }
    else {
        return true;
    }
}
function regExpMail ($mail) {
    $criteres_mail = preg_match('#^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$#', $_POST['mail']);
    return $criteres_mail;
}
function regExpCp ($cp) {
    $criteres_cp = preg_match('#^[0-9]{5}+$#', $_POST['cp']);
    return $criteres_cp;
}
function regExpTitre($titre) {
    $regExp = preg_match('#^[a-zA-Z0-9ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\'\"-_]+$#', $titre);
    if ($regExp == 1) {
        return true;
    }
    else {
        return false;
    }
}
function regExpPrix ($price) {
    $regExp = preg_match('#^[0-9.]+$#', $price);
    if ($regExp == 1) {
        return true;
    }
    else {
        return false;
    }
}

//  FIN FONCTIONS DE FORMULAIRES //

//  FONCTIONS UTILISATEURS/STATUT  //

function userEstConnecte () {
    if (isset($_SESSION['utilisateur'])) {
        return true;
    }
    else {
        return false;
    }
}
function userEstConnecteEtEstAdmin () {
    if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['statut'] == 1) {
        return true;
    }
    else {
        return false;
    }
}

//  FIN FONCTIONS UTILISATEURS/STATUT  //

//  FONCTIONS DE TRAITEMENT DES STRINGS  //

function searchPointPrice ($str) {
    $point = strpos($str, '.');
    if ($point) {
        $price = substr($str, 0, $point);
        $cutPrice = substr($str, $point, strlen($str));
        $cutPrice = str_replace('.', '', $cutPrice);
		if ($cutPrice == 00) {
			$cutPrice = str_replace($cutPrice, '<span>€</span>', $cutPrice);
		}
		else {
			$cutPrice = str_replace($cutPrice, '<span>€' . $cutPrice . '</span>', $cutPrice);
		}
		return $price . $cutPrice;
    }
    else {
        return $str . '€';
    }
}
function cut ($str, $len, $sep) {
	if (mb_strlen($str, "UTF-8") <= $len) {
		return $str;
	}
	else {
		$str = substr($str, 0, $len);
		$space = strrpos($str, ' ');
		$str = substr($str, 0, $space);
		return $str . $sep;
	}
}
function verifExt ($arg) {
    $str = strrpos($arg, '.');
    $str = substr($arg, ($str + 1), mb_strlen($arg, 'UTF-8'));
    $str = strtolower($str);
    $tab = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($str, $tab)) {
        return true;
    }
    else {
        return false;
    }
}

//  FIN DE FONCTIONS DE TRAITEMENT DES STRINGS  //

//  FONCTIONS DU PANIER  //

function creationPanier () {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['id_article'] = array();
        $_SESSION['panier']['nom'] = array();
        $_SESSION['panier']['marque'] = array();
        $_SESSION['panier']['image_1'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['url'] = array();
    }
    if (!isset($_SESSION['last_panier'])) {
        $_SESSION['last_panier'] = array();
        $_SESSION['last_panier']['id_article'] = array();
        $_SESSION['last_panier']['nom'] = array();
        $_SESSION['last_panier']['marque'] = array();
        $_SESSION['last_panier']['image_1'] = array();
        $_SESSION['last_panier']['prix'] = array();
        $_SESSION['last_panier']['url'] = array();
    }
}
function lastAddedToPanier ($id_article, $nom, $marque, $image_1, $prix, $url) {
    $_SESSION['last_panier']['id_article'] = $id_article;
    $_SESSION['last_panier']['nom'] = $nom;
    $_SESSION['last_panier']['marque'] = $marque;
    $_SESSION['last_panier']['image_1'] = $image_1;
    $_SESSION['last_panier']['prix'] = $prix;
    $_SESSION['last_panier']['url'] = $url;
}
function ajouterAuPanier ($id_article, $nom, $marque, $image_1, $prix, $quantite, $url) {
    $cle_existe = array_search($id_article, $_SESSION['panier']['id_article']);
    if ($cle_existe !== FALSE) {
        $_SESSION['panier']['quantite'][$cle_existe] += 1;
    }
    else {
        $_SESSION['panier']['id_article'][] = $id_article;
        $_SESSION['panier']['nom'][] = $nom;
        $_SESSION['panier']['marque'][] = $marque;
        $_SESSION['panier']['image_1'][] = $image_1;
        $_SESSION['panier']['prix'][] = $prix;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['url'][] = $url;
    }
}
function modifierQtePanier ($id_article, $modifQte) {
    $cle_existe = array_search($id_article, $_SESSION['panier']['id_article']);
    if ($cle_existe !== FALSE) {
        if ($modifQte == '+') {
            $_SESSION['panier']['quantite'][$cle_existe] += 1;
        }
        else {
            $_SESSION['panier']['quantite'][$cle_existe] -= 1;
        }
        if ($_SESSION['panier']['quantite'][$cle_existe] <= 0) {
            foreach ($_SESSION['panier'] AS $key => $val) {
    			array_splice($_SESSION['panier'][$key], $cle_existe, 1);
    		}
        }
        if (empty($_SESSION['panier']['id_article'][0])) {
            unset($_SESSION['panier']);
            unset($_SESSION['last_panier']);
            unset($_SESSION['prix_total']);
        }
    }
}
function retirerArticlePanier ($arg) {
	$pos = array_search($arg, $_SESSION['panier'] ['id_article']);
	if ($pos !== FALSE) {
		foreach ($_SESSION['panier'] AS $key => $val) {
			array_splice($_SESSION['panier'][$key], $pos, 1);
		}
        if (empty($_SESSION['panier']['id_article'][0])) {
            unset($_SESSION['panier']);
            unset($_SESSION['last_panier']);
            unset($_SESSION['prix_total']);
        }
	}
}
//  FIN DE FONCTIONS DU PANIER  //

 ?>
