<?php

$id=filter_input(INPUT_GET, "id");

require_once "../config.php";

$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r=$db->prepare("delete from administrateur where id=:id");

$r->bindParam("id",$id);

$r->execute();

header('location: ../indexAdmin.php');