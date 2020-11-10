<?php

$NomUtilisateur=filter_input(INPUT_POST, "NomUtilisateur");
$MotDePasse=filter_input(INPUT_POST,"MotDePasse");


$id_zone=filter_input(INPUT_POST, "id_zone");


require "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("update utilisateur set  NomUtilisateur=:NomUtilisateur, MotDePasse=:MotDePasse where id=:id");


$r->bindParam(":NomUtilisateur",$NomUtilisateur);
$r->bindParam(":MotDePasse",$MotDePasse);



$r->execute();

header('location: ../indexUtilisateur.php?id=' . $id_zone);