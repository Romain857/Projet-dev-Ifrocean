<?php
include_once "headerAccueil.php";
    mon_header("Ajouter une inscription Admin");
$valide=filter_input(INPUT_GET,"valide");
    ?>
<main class="container">
    <h1> Ajouter inscription Admin</h1>

    <form method="post" action="action/actionAjoutInscriptionAdmin.php">

        <div class="form-group">
            <label for="Nom"><i class="fas fa-star-christmas"></i> Nom</label>
            <input type="text" class="form-control" id="nom" maxlength="50"
               name="nom"
               placeholder="Nom..." required>
        </div>
        <div class="form-group">
            <label for="MotDePasse"><i class="fas fa-star-christmas"></i> MotDePasse</label>
            <input type="password" class="form-control" id="MotDePasse"
                      name="MotDePasse"
                      placeholder="MotDePasse..."required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"><i class="fas fa-star-christmas"></i>Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
        </div>
        <div class="form-group">
            <label for="NumeroTel"><i class="fas fa-star-christmas"></i> NumeroTel</label>
            <input class="form-control" id="NumeroTel"
                      name="NumeroTel"
                      placeholder="NumeroTel..."required>
        </div>

        <?php
        if ($valide != null){
            ?>
            <p style="color: green">Données enregistrées</p>
            <?php
        }
        ?>

        <a href="accueil.php" class="btn btn-outline-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-success pull-right">Enregistrer</button>
    </form>

<?php
include_once "footer.php";
mon_footer();
?>