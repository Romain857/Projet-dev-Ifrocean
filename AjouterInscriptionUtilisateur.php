<?php
include_once "header.php";
mon_header("Ajouter une inscription");
$id_zone=filter_input(INPUT_GET, "id_zone");
?>
<main class="container">
    <h1> <i class="fas fa-star-christmas"></i>Ajouter inscription Benevole</h1>

        <form method="post" action="action/actionAjoutInscriptionUtilisateur.php">
            <div class="form-group">
                <label for="NomUtilisateur"><i class="fab fa-galactic-senate"></i> NomUtilisateur</label>
                <input type="text" class="form-control" id="NomUtilisateur" maxlength="50"
                        name="NomUtilisateur"
                        placeholder="NomUtilisateur..." required>
            </div>
            <div class="form-group">
                <label for="MotDePasse"><i class="fas fa-star-christmas"></i> MotDePasse</label>
                <input class="form-control" id="MotDePasse"
                          name="MotDePasse"
                          placeholder="MotDePasse...">
             </div>
    <a href="indexUtilisateur.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>

    <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>

</form>