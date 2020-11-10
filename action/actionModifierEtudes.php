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


$r=$db->prepare("update etude set nom=:nom, region=:region, DateDebut=:DateDebut, DateFin=:DateFin, NombrePlage=:NombrePlage where id=:id");

$r->bindParam(":id",$id);
$r->bindParam(":nom",$nom);
$r->bindParam(":region",$region);
$r->bindParam(":DateDebut",$DateDebut);
$r->bindParam(":DateFin",$DateFin);
$r->bindParam(":NombrePlage",$NombrePlage);
$r->execute();
//$r->debugDumpParams();

header('location: ../Etudes.php');
