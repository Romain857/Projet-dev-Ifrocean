<?php

$nom=filter_input(INPUT_POST, "nom");
$superficie=filter_input(INPUT_POST,"superficie");
$commune=filter_input(INPUT_POST,"commune");
$departement=filter_input(INPUT_POST, "departement");
$code=filter_input(INPUT_POST,"code");

$id_plage=filter_input(INPUT_POST, "id_plage");
$id_etude=filter_input(INPUT_POST, "id_etude");


require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("update plage set  nom=:nom, superficie=:superficie, commune=:commune, departement=:departement, code=:code where id=:id");


$r->bindParam(":id",$id_plage);
$r->bindParam(":nom",$nom);
$r->bindParam(":superficie",$superficie);
$r->bindParam(":commune",$commune);
$r->bindParam(":departement",$departement);
$r->bindParam(":code",$code);

$r->execute();

header('location: ../Plages.php?id=' . $id_etude);