<?php
include_once "headerAccueil.php";
mon_header("IFROCEAN");
?>

    <nav class="navbar navbar-light bg-light">
        <main class="container">
        <a class="navbar-brand" href="#"></a>
            <form class="form-inline" style="display: inline" >
                <div class="mx-auto">
                    <a href="connexion.php">
                        <button type="button" class="btn btn-outline-primary">Connexion</button>
                    </a>
                        <a href="ConnexionCode.php" class="btn btn-primary">
                            Connexion bénévole
                        </a>
                </div>
            </form>
    </nav>

<div class="card text-center">
    <div class="card-body">
        <h2 class="IFROCEAN">Projet Dev</h2>
        <img src="image/Ifrocean.png" alt="ifrocean">
        <p class="card-text">Cette étude consiste à recenser et quantifier les populations animales présentes sur l’estran des grandes plages de sable du littoral nord-ouest de la côte atlantique française.</p>
        <a href="AjouterInscriptionAdmin.php">
                <button type="button" class="btn btn-outline-primary">
                Inscription admin
            </button>
    </div>
</div>

<?php
include_once "footer.php";
mon_footer();
?>