<?php
header('Content-type: text/plain');
$id=filter_input(INPUT_GET, "id");

require_once "../config.php";

$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r=$db->prepare("select datefin from etude where id=:id");

$r->bindParam("id",$id);

$r->execute();

$resultats=$r->fetchAll();

foreach ($resultats as $ligne) {
    if ($ligne['datefin'] == 0000-00-00) {
        header('location: ../Etudes.php');
    } else {
        header('location: ../historique.php');
    }
}

$r=$db->prepare("delete from etude where id=:id");

$r->bindParam("id",$id);

$r->execute();



?>