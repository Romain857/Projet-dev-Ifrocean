<?php
include_once "header.php";
mon_header("SupprimerEtudes");
?>
    <main class="container">
    <h1>Supprimer les informations des etudes</h1>

<?php
$id=filter_input(INPUT_GET,"id");
require "config.php";
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select nom, coordonnee, region, DateDebut, DateFin, NombrePlage from etude where id=:id");
$r->bindParam(":id",$id);
$r->execute();

$resultats=$r->fetchAll();

foreach ($resultats as $ligne){
    ?>

    <form method="post" action="action/actionSupprimerEtudes.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <br><div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom" value="<?php echo $resultats["0"]["nom"]?> "
                   placeholder="Nom..." required>
        </div>

        <div class="form-group">
            <label for="coordonnee">Coordonnées</label>
            <input type="text" class="form-control" id="coordonnee" maxlength="50"
                   name="coordonnee" value="<?php echo $resultats["0"]["coordonnee"]?> "
                   placeholder="Coordonnées..." required>
        </div>

        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" class="form-control" id="region" maxlength="50"
                   name="region" value="<?php echo $resultats["0"]["region"]?> "
                   placeholder="Region..." required>
        </div>

        <div class="form-group">
            <label for="DateDebut">Date de début</label>
            <input type="date" class="form-control" id="DateDebut"
                   name="DateDebut" value="<?php echo $resultats["0"]["DateDebut"]?> "
                   placeholder="Date de début..." required>
        </div>

        <div class="form-group">
            <label for="DateFin">Date de fin</label>
            <input type="date" class="form-control" id="DateFin"
                   name="DateFin" value="<?php echo $resultats["0"]["DateFin"]?> "
                   placeholder="Date de fin..." required>
        </div>

        <div class="form-group">
            <label for="NombrePlage">Nombre de Plage</label>
            <input type="text" class="form-control" id="NombrePlage" maxlength="50"
                   name="NombrePlage" value="<?php echo $resultats["0"]["NombrePlage"]?> "
                   placeholder="NombrePlage..." required>
        </div>

        <a href="Etudes.php" class="btn btn-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
    </form>

    <?php
}
?>

<?php
include_once "footer.php";
mon_footer();
?>