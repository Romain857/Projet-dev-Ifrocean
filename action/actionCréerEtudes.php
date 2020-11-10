<?php
$id=filter_input(INPUT_POST, "id");
$nom=filter_input(INPUT_POST, "nom");
$region=filter_input(INPUT_POST,"region");
$DateDebut=filter_input(INPUT_POST, "DateDebut");
$DateFin=filter_input(INPUT_POST, "DateFin");
$NombrePlage=filter_input(INPUT_POST,"NombrePlage");

require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("insert into etude (id, nom, region, DateDebut, DateFin, NombrePlage) values ( :id, :nom, :region, :DateDebut, :DateFin, :NombrePlage)");

$r->bindParam(":id",$id);
$r->bindParam(":nom",$nom);
$r->bindParam(":region",$region);
$r->bindParam(":DateDebut",$DateDebut);
$r->bindParam(":DateFin",$DateFin);
$r->bindParam(":NombrePlage",$NombrePlage);

$r->execute();

header('location: ../Etudes.php');