<?php

$nom=filter_input(INPUT_POST, "nom");

require_once "../config.php";
$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);

$r=$db->prepare("insert into espece (nom) values (:nom) ");

$r->bindParam(":nom",$nom);

$r->execute();

//$r->debugDumpParams();
header('location: ../EspeceAdmin.php');