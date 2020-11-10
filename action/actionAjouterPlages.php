<?php

$nom=filter_input(INPUT_POST, "Nom");
$superficie=filter_input(INPUT_POST,"superficie");
$commune=filter_input(INPUT_POST,"commune");
$departement=filter_input(INPUT_POST, "departement");
$code=filter_input(INPUT_POST,"code");
$id_etude=filter_input(INPUT_POST, "id_etude");

require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("insert into plage ( nom, superficie, commune, departement, code, id_etude)  values (  :nom, :superficie, :commune, :departement, :code, :id_etude)");


$r->bindParam(":nom",$nom);
$r->bindParam(":superficie",$superficie);
$r->bindParam(":commune",$commune);
$r->bindParam(":departement",$departement);
$r->bindParam(":code",$code);
$r->bindParam(":id_etude",$id_etude);
$r->execute();

header('location: ../Plages.php?id='.$id_etude);