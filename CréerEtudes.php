<?php
include_once "header.php";
mon_header("CréerEtudes");
?>

<main class="container" xmlns="http://www.w3.org/1999/html">
    <div class="narval"></div>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Créer les Etudes
            </span>

    </nav>

    <form method="post" action="action/actionCréerEtudes.php">

        <br><div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom"
                   placeholder="Nom..." required>
        </div>

        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" class="form-control" id="region" maxlength="50"
                   name="region"
                   placeholder="Region..." required>
        </div>

        <div class="form-group">
            <label for="DateDebut">Date de début</label>
            <input type="date" class="form-control" id="DateDebut"
                   name="DateDebut"
                   placeholder="Date de début..." required>
        </div>

        <div class="form-group">
            <label for="DateFin">Date de fin</label>
            <input type="date" class="form-control" id="DateFin"
                   name="DateFin"
                   placeholder="Date de fin...">
        </div>

        <div class="form-group">
            <label for="NombrePlage">Nombre de plages</label>
            <input type="text" class="form-control" id="NombrePlage"
                   name="NombrePlage"
                   placeholder="Nombre de plages...">
        </div>

        <a href="Etudes.php" class="btn btn-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
    </form>

<?php
include_once "footer.php";
mon_footer();
?>