<?php
include_once "header.php";
mon_header("SupprimerAdmin");
?>
    <main class="container">
    <h1>Supprimer les inscriptions de l'administrateur</h1>

<?php
$id=filter_input(INPUT_GET,"id");
require "config.php";
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select Nom, MotDePasse, email, NumeroTel from administrateur where id=:id");
$r->bindParam(":id",$id);
$r->execute();

$resultats=$r->fetchAll();

foreach ($resultats as $ligne){
    ?>

    <form method="post" action="action/actionModifierInscriptionAdmin.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <br><div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="Nom" maxlength="50"
                   name="Nom" value="<?php echo $resultats["0"]["nom"]?> "
                   placeholder="Nom..." required>
        </div>

        <div class="form-group">
            <label for="MotDePasse">MotDePasse</label>
            <input type="text" class="form-control" id="MotDePasse" maxlength="50"
                   name="MotDePasse" value="<?php echo $resultats["0"]["MotDePasse"]?> "
                   placeholder="MotDePasse..." required>
        </div>

        <div class="form-group">
            <label for="region">email</label>
            <input type="text" class="form-control" id="email" maxlength="50"
                   name="email" value="<?php echo $resultats["0"]["email"]?> "
                   placeholder="email..." required>
        </div>

        <div class="form-group">
            <label for="NumeroTel">NumeroTel</label>
            <input type="text" class="form-control" id="NumeroTel"
                   name="NumeroTel" value="<?php echo $resultats["0"]["NumeroTel"]?> "
                   placeholder="NumeroTel..." required>
        </div>


        <a href="indexAdmin.php" class="btn btn-danger pull-left">
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