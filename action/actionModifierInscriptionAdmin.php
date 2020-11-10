<?php

$id=filter_input(INPUT_POST,"id");
$nom=filter_input(INPUT_POST, "nom");
$MotDePasse=filter_input(INPUT_POST,"MotDePasse");
$email=filter_input(INPUT_POST,"email");
$NumeroTel=filter_input(INPUT_POST, "NumeroTel");

require "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("update administrateur set nom=:nom, MotDePasse=:MotDePasse, email=:email, NumeroTel=:NumeroTel where id=:id");


$r->bindParam(":id",$id);
$r->bindParam(":nom",$nom);
$r->bindParam(":MotDePasse",$MotDePasse);
$r->bindParam(":email",$email);
$r->bindParam(":NumeroTel",$NumeroTel);


$r->execute();

header('location: ../indexAdmin.php');