<?php
include_once "headerUtilisateur.php";
mon_header("Espece");
$id_zone=filter_input(INPUT_POST,"id");
$id_plage=filter_input(INPUT_POST,'id_plage');


if(empty($id_zone)) {
    $id_zone = filter_input(INPUT_GET, "id");
    $id_plage=filter_input(INPUT_GET,"id_plage");
}
?>


    <main class="container" xmlns="http://www.w3.org/1999/html">
    <div class="narval"></div>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Inserer les espèces
            </span>
    </nav>

        <form method="post" action="action/actionAjouterEspece.php">
            <input type="hidden" name="id_zone" value="<?php echo $id_zone?>">
            <input type="hidden" name="id_plage" value="<?php echo $id_plage?>">

        <main class="container">

            <br>
            <label for="nom"><b>Especes trouvées</b></label>
            <br>
            <select class="form-control" name="nom" id="nom">
                <option value="">--Choisissez l'espece trouvée--</option>
                <option value="huitre">huitre</option>
                <option value="perle">perle</option>
                <option value="ver">ver</option>
                <option value="algue">algue</option>
                <option value="arenicole">arenicole</option>
                <option value="spirorbe">spirorbe</option>
                <option value="phyllodoce planctonique">phyllodoce planctonique</option>
                <option value="néréis verte">néréis verte</option>
                <option value="polychètes perforants">polychètes perforants</option>
                <option value="ver de l'hiver">ver de l'hiver</option>
                <option value="néréis multicolore">néréis multicolore</option>
                <option value="ver myxicole">ver myxicole</option>
                <option value="térébelle de Johnston">térébelle de Johnston</option>
                <option value="owenia fusiforme">owenia fusiforme</option>
                <option value="phyllodoce tacheté">pyllodoce tacheté</option>
            </select>
            <br>
            <div class="form-group">
                <label for="NombreEspece"><b>Nombre trouvé</b></label>
            <input type="text" class="form-control" id="NombreEspece" maxlength="50"
                   name="NombreEspece"
                   placeholder="Nombre d'espece trouvé..." required>
        </div>


            <a href="SaisirCoordonnee.php?id_plage=<?php echo $id_plage?>" class="btn btn-danger pull-left">
                <i class="fal fa-long-arrow-left"></i>
                Retour
            </a>

        <button type="submit" class="btn btn-primary pull-right" onclick="return confirm('Etes-vous sur ?')">Enregistrer</button>

</form>



    <table class="table table-bordered table-hover">
    <p align="center">
    <br>
<tr>
    <th>Nom</th>
    <th>Nombre d'espèces</th>
</tr>

<?php
    require"config.php";
    $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
        ,Config::UTILISATEUR, Config::MOTDEPASSE);

    $r = $db->prepare("select id, nom, ne.nombre FROM espece e join nombreparespece ne on e.id=ne.id_espece where id_zone=:id_zone");
    $r->bindParam("id_zone",$id_zone);
    $r->execute();

    $resultats=$r->fetchAll();

    foreach ($resultats as $ligne) {
        ?>


    <tr>
        <td><?php echo $ligne ["nom"]?></td>
        <td><?php echo $ligne ["nombre"]?></td>
    </tr>

    <?php
    }
    ?>

<?php
include_once "footer.php";
mon_footer();
?>