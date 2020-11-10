<?php
session_start();
function mon_header($title){
    ?>
    <!doctype html>
    <html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IFROCEAN</title>
    <link rel="stylesheet" href="global.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/edc8d5fc95.js" crossorigin="anonymous"></script>
    <?php
    if (($_SESSION['verif']==0) or (empty($_SESSION['verif']))){
        header('location:accueil.php');
    }
    ?>
    <div id="bande">
        <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#contenu">
            Menu
        </button>
        <div class="collapse" id="contenu">
            <a data-toggle="collapse" href="#contenu">
                <a href="accueil.php"> Se déconnecter</a>
                <i class="fas fa-lock"></i>
            </a>
        </div>

        <h2 style="display" ="inline" >
        <i class="narval"></i><h1>Ifrocean</h1>
        <p align="right">
            <?php
            echo date("Y-m-d h:i:a")
            ?>
    </div>
<?php }?>