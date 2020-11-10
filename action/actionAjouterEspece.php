<?php
header('Content-type: text/plain');
$nom=filter_input(INPUT_POST, "nom");
$NombreEspece=filter_input(INPUT_POST, "NombreEspece");
$id_zone=filter_input(INPUT_POST,"id_zone");
$id_plage=filter_input(INPUT_POST,"id_plage");


require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);

$r = $db->prepare("select * from espece");

$r->execute();
$resutats=$r->fetchAll();
foreach ($resutats as $ligne){
    if($nom==$ligne['nom']){
        $id_espece=$ligne['id'];

    }
}

$r=$db->prepare("insert into nombreparespece (nombre, id_zone, id_espece) values (:nombre, :id_zone, :id_espece)");

$r->bindParam(":nombre",$NombreEspece);
$r->bindParam(":id_zone",$id_zone);
$r->bindParam(":id_espece",$id_espece);

$r->execute();
//$r->debugDumpParams();

header('location: ../Espece.php?id=' . $id_zone .'&id_plage='.$id_plage);