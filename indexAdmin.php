<?php
include_once "header.php";
    mon_header("IFROCEAN");
$id_etude=filter_input(INPUT_GET,"id");
    ?>
    <main class="container"
    <h1><a href="#" class="text-decoration-none">
            <p class="font-italic">Listes des inscriptions Admin</p>
        </a>
    </h1>
    <table class="table">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">MotDePasse</th>
            <th scope="col">email</th>
            <th scope="col">NumeroTel</th>
        </tr>
    <?php
    require "config.php";
    $db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);
    $r = $db->prepare("select id, Nom, MotDePasse, email, NumeroTel from administrateur");
    $r->execute();
    $resultats=$r->fetchALL();



    foreach ($resultats as $ligne){
        ?>
        <tr>
            <td><?php echo $ligne["Nom"] ?></td>
            <td><?php echo $ligne["MotDePasse"] ?></td>
            <td><?php echo $ligne["email"] ?></td>
            <td><?php echo $ligne["NumeroTel"] ?></td>
            <td>
                <form method="get" action="modifierUneInscriptionAdmin.php">
                    <input type="hidden" name="id" value="<?php echo $ligne["id"] ?>">
                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fa fa-user-edit"></i>
                    </button>

                <a href="action/actionSupprimerAdmin.php?id=<?php echo $ligne["id"] ?>"
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

    <a href="Etudes.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>

<?php
include_once "footer.php";
mon_footer();
?>