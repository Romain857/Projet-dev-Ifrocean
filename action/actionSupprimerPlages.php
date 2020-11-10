<?php
header('Content-type: text/plain');
$id = filter_input(INPUT_GET, "id");
$id_etude=filter_input(INPUT_GET, "id_etude");

require_once "../config.php";

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASEDEDONNEES
    , Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select datefin from etude where id=:id");

$r->bindParam(":id", $id_etude);

$r->execute();

$resultats = $r->fetchAll();

$r = $db->prepare("delete from plage where id=:id");

$r->bindParam(":id", $id);

$r->execute();

    if ($resultats[0]['datefin'] == 0000 - 00 - 00) {

        header('location: ../Plages.php?id=' . $id_etude);
    } else {

        header('location: ../HistoriquePlage.php?id=' . $id_etude);
    }




