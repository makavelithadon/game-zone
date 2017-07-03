<?php

require_once('inc/init.inc.php');
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // gère la déconnexion
    unset($_SESSION['utilisateur']);
	if (isset($_SESSION['panier'])) {
        unset($_SESSION['panier']);
    }
    $posRequestURI = strpos($_SERVER['HTTP_REFERER'], 'panier-final');
    if ($posRequestURI != FALSE) {
        header('location:' . RACINE_SITE . 'panier-final');
        exit();
    }
    else {
        header('location:' . RACINE_SITE . 'accueil');
        exit();
    }
}
if (isset($_SERVER['HTTP_REFERER'])) {
	$postReferer = strpos($_SERVER['HTTP_REFERER'], 'inscription-success');
	if ($postReferer != FALSE) {
		if (isset($_SESSION['last_inscrit'])) {
			unset($_SESSION['last_inscrit']);
		}
	}
}

if (!empty($_GET['page']) && is_file('controleurs/'. $_GET['page'] . '.php')) {
    include('controleurs/' . $_GET['page'] . '.php');
}
else if (!empty($_GET['admin']) && is_file('admin/controleurs/'. $_GET['admin'] . '.php')) {
    include('admin/controleurs/' . $_GET['admin'] . '.php');
}
else {
    include('controleurs/index.php');
}
 ?>
