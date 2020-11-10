<?php
include_once "header.php";
mon_header("Modifier une inscription Utilisateur");
?>

<h1>modifier une inscription Utilisateur</h1>

<?php
$id=filter_input(INPUT_GET,"id");
require "config.php";
$db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);
$r = $db->prepare("select id, NomUtilisateur, MotDePasse, id-zone from utilisateur"." where id=:id");
$r->bindParam("id",$id);
$r->execute();

$resultats=$r->fetchALL();
var_dump($resultats);

if(count($resultats)!=1){
    http_response_code(404);
    echo "Pas d'inscription avec cet id... <a href='indexUtilisateur.php'>Retour</a>";
    include "footer.php";
    mon_footer();
    die(); //j'arrête là
}
?>

<form method="post" action="action/actionAjoutInscriptionUtilisateur.php?id=<?php echo $id ?>">
    <div class="form-group">
        <label for="NomUtilisateur"><i class="fab fa-galactic-senate"></i> NomUtilisateur</label>
        <input type="text" class="form-control" id="Nom" maxlength="50"
               name="NomUtilisateur" value="<?php echo $resultats[0]["NomUtilisateur"] ?>"
               placeholder="NomUtilisateur..." required>
    </div>
    <div class="form-group">
        <label for="MotDePasse"><i class="fas fa-star-christmas"></i> MotDePasse</label>
        <textarea class="form-control" id="MotDePasse"
                  name="MotDePasse"
                  placeholder="MotDePasse..."><?php echo $resultats[0]["MotDePasse"] ?></textarea>
    </div>

    <a href="indexUtilisateur.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>
    <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
</form>