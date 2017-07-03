<?php

$host = "localhost";
$db_name = "game_zone";
$user = "root";
$mdp = "";

$bdd = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) or die('Erreur de connexion à la base de données !');

 ?>
