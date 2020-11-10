<?php
include_once "header.php";
mon_header("AjouterPlages");
$id_etude=filter_input(INPUT_GET, "id_etude");
?>

<main class="container" xmlns="http://www.w3.org/1999/html">
    <div class="narval"></div>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Informations sur les plages
            </span>
    </nav>

    <form method="post" action="action/actionAjouterPlages.php">

        <input type="hidden" name="id_etude" value="<?php echo $id_etude?>">

        <br><div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="Nom"
                   placeholder="Nom..." required>
            </div>

        <div class="form-group">
            <label for="superficie">Superficie en m²</label>
            <input type="text" class="form-control" id="superficie" maxlength="50"
                   name="superficie"
                   placeholder="Superficie..." required>
        </div>

        <div class="form-group">
            <label for="commune">Commune</label>
            <input type="text" class="form-control" id="commune" maxlength="50"
                   name="commune"
                   placeholder="Commune..." required>
        </div>

        <div class="form-group">
            <label for="departement">Departement</label>
            <input type="text" class="form-control" id="departement"
                      name="departement"
                   placeholder="Departement..." required>
        </div>

        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code"
                   name="code"
                   placeholder="Code..." required>
        </div>

        <a href="Plages.php?id=<?php echo $id_etude?>" class="btn btn-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
    </form>

    <?php
    include_once "footer.php";
    mon_footer();
    ?>


