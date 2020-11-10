<?php
session_start();
$_SESSION['verif']=1;
header('Content-type: text/plain');
require_once "../config.php";

$code=filter_input(INPUT_POST, "code");


$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r = $db->prepare("select * from plage");


$r->execute();
$resutats=$r->fetchAll();

$error=0;
foreach ($resutats as $ligne){
    if($code==$ligne['code']){
        $error=1;
        $id=$ligne['id'];
    }
}


if ($error==0){
    header('location: ../ConnexionCode.php?error='.$error);
}else{
    echo 'Le code est bon '."\n";
    echo "L'id de la plage est ".$id;
    header('location: ../SaisirCoordonnee.php?id_plage='.$id);

}
var_dump($GLOBALS);


?>