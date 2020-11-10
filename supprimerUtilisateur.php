<?php
include_once "header.php";
mon_header("SupprimerUtilisateur");
?>
    <main class="container">
    <h1>Supprimer les inscriptions de l'utilisateur</h1>

<?php
$id=filter_input(INPUT_GET,"id");
require "config.php";
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select NomUtilisateur, MotDePasse from utilisateur where id=:id");
$r->bindParam(":id",$id);
$r->execute();

$resultats=$r->fetchAll();

foreach ($resultats as $ligne){
    ?>

    <form method="post" action="action/actionModifierInscriptionUtilisateur.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <br><div class="form-group">
            <label for="NomUtilisateur">NomUtilisateur</label>
            <input type="text" class="form-control" id="NomUtilisateur" maxlength="50"
                   name="NomUtilisateur" value="<?php echo $resultats["0"]["nomUtilisateur"]?> "
                   placeholder="NomUtilisateur..." required>
        </div>

        <div class="form-group">
            <label for="MotDePasse">MotDePasse</label>
            <input type="text" class="form-control" id="MotDePasse" maxlength="50"
                   name="MotDePasse" value="<?php echo $resultats["0"]["MotDePasse"]?> "
                   placeholder="MotDePasse..." required>
        </div>

        <a href="indexUtilisateur.php" class="btn btn-danger pull-left">
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