<?php
include_once "header.php";
mon_header("ModifierPlages");
?>
    <main class="container">
    <h1>Modifier les informations des plages</h1>

<?php
$id_etude=filter_input(INPUT_GET,"id_etude");
$id_plage=filter_input(INPUT_GET, "id_plage");

require "config.php";
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select id, nom, superficie, commune, departement, code from plage where id=:id");
$r->bindParam(":id",$id_plage);
$r->execute();




$resultats=$r->fetchAll();

?>

    <form method="post" action="action/actionModifierPlages.php">
        <input type="hidden" name="id_plage" value="<?php echo $id_plage ?>">
        <input type="hidden" name="id_etude" value="<?php echo $id_etude ?>">

        <main class="container">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom" value="<?php echo $resultats["0"]["nom"]?> "
                   placeholder="nom..." required>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie en m²</label>
            <input type="text" class="form-control" id="superficie" maxlength="50"
                   name="superficie" value="<?php echo $resultats["0"]["superficie"]?> "
                   placeholder="Superficie..." required>
        </div>
        <div class="form-group">
            <label for="commune">Commune</label>
            <input class="form-control" id="commune"
                   name="commune" value="<?php echo $resultats["0"]["commune"]?>"
                   placeholder="Commune...">
        </div>
        <div class="form-group">
            <label for="departement">Departement</label>
            <input type="text" class="form-control" id="departement" maxlength="50"
                   name="departement" value="<?php echo $resultats["0"]["departement"]?> "
                   placeholder="Departement..." required>
        </div>
        <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" maxlength="50"
                       name="code" value="<?php echo $resultats["0"]["code"]?>"
                       placeholder="Code..." required>
            </div>

        <a href="Plages.php?id=<?php echo $id_etude; ?>" class="btn btn-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
    </form>

<?php
include_once "footer.php";
mon_footer();
?>