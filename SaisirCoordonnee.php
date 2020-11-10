<?php
include_once "headerUtilisateur.php";
mon_header("IFROCEAN");
$id_plage=filter_input(INPUT_GET,'id_plage');
?>

<main class="container" xmlns="http://www.w3.org/1999/html">
    <div class="narval"></div>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Saisir les informations de votre zone
            </span>
    </nav>

<form method="post" action="action/actionSaisirCoordonnee.php">
    <input type="hidden" name="id_plage" value="<?php echo $id_plage?>">

    <main class="container">
    <br><div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" maxlength="50"
               name="nom"
               placeholder="Nom..." required>
    </div>

    <div class="form-group">
            <label for="NombrePersonnes">Nombre de Personnes</label>
            <input type="number" class="form-control" id="NombrePersonnes" maxlength="50"
                   name="NombrePersonnes"
                   placeholder="Nombre de personnes..." required>
    </div>

    <div class="form-group">
            <label for="DateDebut">Date de début</label>
            <input type="date" class="form-control" id="DateDebut"
                   name="DateDebut"
                   placeholder="Date de début..." required>
    </div>

    <div class="row">
        <div class="col-sm">
            <label for="lat1">latitude a</label>
            <input type="number" step="any" class="form-control" id="lat1" name="lat1" placeholder="latitude" required>
        </div>
        <div class="col-sm">
            <label for="long1">longitude a</label>
            <input type="number" step="any" class="form-control" id="long1" name="long1" placeholder="longitude" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <label for="lat2">latitude b</label>
            <input type="number" step="any" class="form-control" id="lat2" name="lat2" placeholder="latitude" required>
        </div>
        <div class="col-sm">
            <label for="long2">longitude b</label>
            <input type="number" step="any" class="form-control" id="long2" name="long2" placeholder="longitude" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <label for="lat3">latitude c</label>
            <input type="number" step="any" class="form-control" id="lat3" name="lat3" placeholder="latitude" required>
        </div>
        <div class="col-sm">
            <label for="long3">longitude c</label>
            <input type="number" step="any" class="form-control" id="long3" name="long3" placeholder="longitude" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <label for="lat4">latitude d</label>
            <input type="number" step="any" class="form-control" id="lat4" name="lat4" placeholder="latitude" required>
        </div>
        <div class="col-sm">
            <label for="long4">longitude d</label>
            <input type="number" step="any" class="form-control" id="long4" name="long4" placeholder="longitude" required>
            <br>
        </div>
    </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
</form>

<br>


    <table class="table table-bordered table-hover">

            <br>
            <tr>
                <th>Nom</th>
                <th>Nombre de personnes</th>
                <th>Date de début</th>
                <th>lat1</th>
                <th>long1</th>
                <th>lat2</th>
                <th>long2</th>
                <th>lat3</th>
                <th>long3</th>
                <th>lat4</th>
                <th>long4</th>
            </tr>

<?php
require"config.php";
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
    ,Config::UTILISATEUR, Config::MOTDEPASSE);

$r = $db->prepare("select id, id_plage, nom, NombrePersonnes, lat1, long1, lat2, long2, lat3, long3, lat4, long4, DateDebut from zone where id_plage=:id_plage");
$r->bindParam(":id_plage",$id_plage);
$r->execute();

$resultats=$r->fetchAll();

foreach ($resultats as $ligne) {
    ?>


<tr>
    <td><?php echo $ligne ["nom"]?></td>
    <td><?php echo $ligne ["NombrePersonnes"]?></td>
    <td><?php echo $ligne ["DateDebut"]?></td>
    <td><?php echo $ligne ["lat1"]?></td>
    <td><?php echo $ligne ["long1"]?></td>
    <td><?php echo $ligne ["lat2"]?></td>
    <td><?php echo $ligne ["long2"]?></td>
    <td><?php echo $ligne ["lat3"]?></td>
    <td><?php echo $ligne ["long3"]?></td>
    <td><?php echo $ligne ["lat4"]?></td>
    <td><?php echo $ligne ["long4"]?></td>

    <td>
        <form method="post" action="Espece.php">
            <input type="hidden" name="id_plage" value="<?php echo $id_plage?>">
            <input type="hidden" name="id" value="<?php echo $ligne["id"]?>">
            <button type="submit" class="btn btn-primary"> <i class="fas fa-plus"></i> Especes</button>
        </form>
    </td>
</tr>

<?php
}
?>

<?php
include_once "footer.php";
mon_footer();
?>
