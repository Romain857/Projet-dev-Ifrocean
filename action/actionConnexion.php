<?php
//je récipère les données du post
$email=filter_input(INPUT_POST, "email");
$Password=filter_input(INPUT_POST,"Password");
//j'insère ces données dans le BDD
require_once "../config.php";

//Créer un objet de connexion à la BDD avec PDO /PDO c'est une classe
$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);

//je prépare une requête SQL
$r=$db->prepare("insert into connexion (email, Password)"."values (:email, :Password)");

$r->bindParam(":email",$email);
$r->bindParam(":Password",$Password);

//$r->
$r->execute();

//je retourne à l'accueil
//en faisant une redirection du header HTTP
header('location: ../connexion.php');