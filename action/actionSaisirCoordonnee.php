<?php

$id_plage=filter_input(INPUT_POST, "id_plage");
$nom=filter_input(INPUT_POST,"nom");
$NombrePersonnes=filter_input(INPUT_POST,"NombrePersonnes");
$lat1=filter_input(INPUT_POST,"lat1");
$long1=filter_input(INPUT_POST,"long1");
$lat2=filter_input(INPUT_POST,"lat2");
$long2=filter_input(INPUT_POST,"long2");
$lat3=filter_input(INPUT_POST,"lat3");
$long3=filter_input(INPUT_POST,"long3");
$lat4=filter_input(INPUT_POST,"lat4");
$long4=filter_input(INPUT_POST,"long4");
$DateDebut=filter_input(INPUT_POST,"DateDebut");

function get_distance_m($lata, $lnga, $latb, $lngb) {
    $earth_radius = 6371;   // Terre = sphère de 6378km de rayon
    $rlo1 = deg2rad($lnga);
    $rla1 = deg2rad($lata);
    $rlo2 = deg2rad($lngb);
    $rla2 = deg2rad($latb);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return ($earth_radius * $d);
}

$ab=get_distance_m($lat1,$long1,$lat2,$long2);
$ab *= 1000;
$ac=get_distance_m($lat1,$long1,$lat3,$long3);
$ac *= 1000;
$bc=get_distance_m($lat2,$long2,$lat3,$long3);
$bc*= 1000;
$cd=get_distance_m($lat3,$long3,$lat4,$long4);
$cd *= 1000;
$db=get_distance_m($lat4,$long4,$lat2,$long2);
$db *= 1000;


$p=($ab+$ac+$bc)/2;
$p2=($bc+$cd+$db)/2;

$s=sqrt($p*($p-$ab)*($p-$ac)*($p-$bc))+sqrt($p2*($p2-$bc)*($p2-$cd)*($p2-$db));


require_once "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);

$r=$db->prepare("insert into zone (id_plage, nom, NombrePersonnes, lat1, long1, lat2, long2, lat3, long3, lat4, long4, superficie, DateDebut) values (:id_plage, :nom, :NombrePersonnes, :lat1, :long1, :lat2, :long2, :lat3, :long3, :lat4, :long4, :superficie, :DateDebut) ");

$r->bindParam(":id_plage",$id_plage);
$r->bindParam(":nom",$nom);
$r->bindParam(":NombrePersonnes",$NombrePersonnes);
$r->bindParam(":lat1",$lat1);
$r->bindParam(":long1",$long1);
$r->bindParam(":lat2",$lat2);
$r->bindParam(":long2",$long2);
$r->bindParam(":lat3",$lat3);
$r->bindParam(":long3",$long3);
$r->bindParam(":lat4",$lat4);
$r->bindParam(":long4",$long4);
$r->bindParam(":superficie",$s);
$r->bindParam(":DateDebut",$DateDebut);

$r->execute();


header('location: ../SaisirCoordonnee.php?id_plage=' . $id_plage);

