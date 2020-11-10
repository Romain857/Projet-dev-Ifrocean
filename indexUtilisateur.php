<?php
include_once "header.php";
mon_header("IFROCEAN");
$id_zone=filter_input(INPUT_GET,"id");
?>
    <main class="container"
    <h1><i class="fas fa-star-christmas"></i>
        <a href="#" class="text-decoration-none">
            <p class="font-italic">Listes des inscriptions Utilisateur</p>
        </a>
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">NomUtilisateur</th>
            <th scope="col">MotDePasse</th>
        </tr>
        </thead>

        <?php
        require "config.php";
        $db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);
        $r = $db->prepare("select id, NomUtilsateur, MotDePasse from utilisateur");
        $r->execute();

        $resultats=$r->fetchALL();


        foreach ($resultats as $ligne){
            ?>
            <tr>
                <td><?php echo $ligne["NomUtilsateur"] ?></td>
                <td><?php echo $ligne["MotDePasse"] ?></td>
                <td>
                    <form method="get" action="modifierUneInscriptionUtilisateur.php">
                        <input type="hidden" name="id_etude" value="<?php echo $id_zone ?>">
                        <button type="submit"
                                class="btn btn-primary">
                            <i class="fa fa-user-edit"></i>
                        </button>
                    </form>
                    <a href="modifierUneInscriptionUtilisateur.php?id=<?php echo $ligne["id"]?> ";
                       class="btn btn-danger pull-left">
                        <i class="fal fa-long-arrow-left"></i>
                    </a>
                    <a href="action/actionSupprimerPlages.php?id=<?php echo $ligne["id"] ?>"
                       onclick="return confirm('Etes-vous sur ?')"
                       class="btn btn-danger">
                        <i class="fa fa-recycle"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <a href="accueil.php" class="btn btn-danger pull-left">
        Retour
    </a>
    <a href="AjouterInscriptionUtilisateur.php" class="btn btn-success">ajouter inscription Utilisateur</a>



<?php
include_once "footer.php";
mon_footer();
?>