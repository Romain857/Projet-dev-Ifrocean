<?php
$id=filter_input(INPUT_POST, "id");
$libelle=filter_input(INPUT_POST, "libelle");


require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r=$db->prepare("insert into code (id, libelle) values ( :id, :libelle)");

$r->bindParam(":id",$id);
$r->bindParam(":libelle",$libelle);

$r->execute();

header('location: ../code.php');