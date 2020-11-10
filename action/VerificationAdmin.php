<?php
session_start();
$_SESSION['verif']=0;
header('Content-type: text/plain');
require_once "../config.php";

$MotDePasse=filter_input(INPUT_POST, "MotDePasse");
$email=filter_input(INPUT_POST,"email");

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES,
    config::UTILISATEUR,config::MOTDEPASSE);


$r = $db->prepare("select * from administrateur");


$r->execute();
$resultats=$r->fetchAll();

$error=0;
foreach ($resultats as $ligne){
    if($MotDePasse==$ligne['MotDePasse'] and $email==$ligne['email'] ){
        $error=1;
        $id=$ligne['id'];
    }
}

if ($error==0){
    header('location: ../connexion.php?error='.$error);
}else{
    header('location: ../Etudes.php');

}

?>