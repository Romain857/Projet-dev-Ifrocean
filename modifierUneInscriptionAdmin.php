<?php
include_once "header.php";
mon_header("Modifier une inscription Admin");
$id=filter_input(INPUT_GET,"id");
?>

<main class="container">
<h1>modifier une inscription Admin</h1>

    <?php

    require "config.php";
    $db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);
    $r = $db->prepare("select id, nom, MotDePasse, email, NumeroTel from administrateur where id=:id");
    $r->bindParam("id",$id);
    $r->execute();

    $resultats=$r->fetchALL();

    ?>

        <form method="post" action="action/actionModifierInscriptionAdmin.php">
            <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group">
        <label for="Nom"><i class="fab fa-galactic-senate"></i> nom</label>
        <input type="text" class="form-control" id="nom" maxlength="50"
               name="nom" value="<?php echo $resultats[0]["nom"] ?>"
               placeholder="Nom..." required>
    </div>
    <div class="form-group">
        <label for="MotDePasse"><i class="fas fa-star-christmas"></i> MotDePasse</label>
        <input class="form-control" id="MotDePasse"
                  name="MotDePasse" value="<?php echo $resultats[0]["MotDePasse"] ?>"
                  placeholder="MotDePasse...">
    </div>
    <div class="form-group">
        <label for="email"><i class="fas fa-star-christmas"></i> email</label>
        <input class="form-control" id="email"
                  name="email" value="<?php echo $resultats[0]["email"] ?>"
                  placeholder="email...">
    </div>
    <div class="form-group">
        <label for=NumeroTel"><i class="fas fa-star-christmas"></i> NumeroTel</label>
        <input class="form-control" id="NumeroTel"
                  name="NumeroTel" value="<?php echo $resultats[0]["NumeroTel"] ?>"
                  placeholder="NumeroTel...">
    </div>
    <a href="indexAdmin.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>
    <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
</form>