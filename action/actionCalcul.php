<?php
header('Content-type: text/plain');



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
    require"../config.php";
    $id=26;
    $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
        ,Config::UTILISATEUR, Config::MOTDEPASSE);
    $r = $db->prepare("select  * from zone where id=:id");
    $r->bindParam(":id",$id);
    $r->execute();
    $resultats=$r->fetchAll();

    $lata=($resultats)[0]['lat1'];
    $latb=$resultats[0]['lat2'];
    $latc=($resultats)[0]['lat3'];
    $latd=$resultats[0]['lat4'];
    $longa=$resultats[0]['long1'];
    $longb=$resultats[0]['long2'];
    $longc=$resultats[0]['long3'];
    $longd=$resultats[0]['long4'];

$ab=get_distance_m($lata,$longa,$latb,$longb);
$ab *= 1000;
$ac=get_distance_m($lata,$longa,$latc,$longc);
$ac *= 1000;
$bc=get_distance_m($latb,$longb,$latc,$longc);
$bc*= 1000;
$cd=get_distance_m($latc,$longc,$latd,$longd);
$cd *= 1000;
$db=get_distance_m($latd,$longd,$latb,$longb);
$db *= 1000;


$p=($ab+$ac+$bc)/2;
$p2=($bc+$cd+$db)/2;

$s=sqrt($p*($p-$ab)*($p-$ac)*($p-$bc))+sqrt($p2*($p2-$bc)*($p2-$cd)*($p2-$db));




