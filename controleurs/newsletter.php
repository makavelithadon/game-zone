<?php

include(dirname(__FILE__) . '/../modeles/newsletter.php');

if (!userEstConnecte()) {
    $disconnect = true;
}
else {
    $connect = true;
    $getInscrit = getInscritsNewsletter ($_SESSION['utilisateur']['id_membre']);
}

$msg_pseudo = '';
$msg_pass = '';
$msg = '';


if(isset($_POST['submit']) && $_POST['submit'] == 'Je souhaite m\'abonner à la newsletter')
{
	$id_membre = strip_tags(htmlentities($_POST['id_membre'], ENT_QUOTES));
	$req = "INSERT INTO newsletter VALUES(NULL, :id_membre)";
	$insert_newsletter = $bdd->prepare($req);
	$insert_newsletter->execute(array('id_membre' => $id_membre));
	header('location:/game_zone/newsletter');
}

include(dirname(__FILE__) . '/../vues/newsletter.php');

?>
