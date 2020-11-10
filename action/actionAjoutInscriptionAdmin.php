<?php

$nom=filter_input(INPUT_POST, "nom");
$MotDePasse=filter_input(INPUT_POST,"MotDePasse");
$email=filter_input(INPUT_POST,"email");
$NumeroTel=filter_input(INPUT_POST,"NumeroTel");

require "../config.php";

$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);


$r=$db->prepare("insert into administrateur (nom, MotDePasse, email, NumeroTel) values (:nom, :MotDePasse, :email, :NumeroTel)");

$r->bindParam(":nom",$nom);
$r->bindParam(":MotDePasse",$MotDePasse);
$r->bindParam(":email",$email);
$r->bindParam(":NumeroTel",$NumeroTel);

$r->execute();

$valide=0;
foreach ($resultats as $ligne){
    if($nom==$ligne['nom'] and $MotDePasse==$ligne['MotDePasse'] and $email==$ligne['email']  and$NumeroTel==$ligne['NumeroTel'] ){
        $error=1;
    }
}

if ($valide==0){
    header('location: ../AjouterInscriptionAdmin.php?valide='.$valide);
}else{
    header('location: ../AjouterInscriptionAdmin.php');

}
?>