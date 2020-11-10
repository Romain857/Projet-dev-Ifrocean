<?php
//je récipère les données du post
$Nom=filter_input(INPUT_POST, "NomUtilisateur");
$MotDePasse=filter_input(INPUT_POST,"MotDePasse");
//$mail=filter_input(INPUT_POST,"email");
//$NumeroTel=filter_input(INPUT_POST,"NumeroTel");
//j'insère ces données dans le BDD
require "../config.php";

//Créer un objet de connexion à la BDD avec PDO /PDO c'est une classe
$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);

//je prépare une requête SQL
$r=$db->prepare("insert into utilisateur (NomUtilsateur, MotDePasse) values (:NomUtilisateur, :MotDePasse)");

$r->bindParam(":NomUtilisateur",$Nom);
$r->bindParam(":MotDePasse",$MotDePasse);

$r->execute();
//var_dump($r);
//$r->debugDumpParams();
//je retourne à l'accueil
//en faisant une redirection du header HTTP
header('location: ../indexUtilisateur.php');