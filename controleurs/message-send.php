<?php
if (!isset($_SESSION['message_envoye'])) {
    header('location:/game_zone/accueil');
}



include(dirname(__FILE__) . '/../vues/message-send.php');

unset($_SESSION['message_envoye']);

?>
