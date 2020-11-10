<?php
include_once "header.php";
mon_header("Etudes");
?>

    <main class="container"
    <br><table class="table table-bordered table-hover">
    <tr>
        <th>Nom</th>
        <th>Région</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Nombre de plages</th>
        <th>Statut</th>
    </tr>

    <a href="CréerEtudes.php" class="btn btn-primary">Créer une étude</a>

    <?php
    require"config.php";
    $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
        ,Config::UTILISATEUR, Config::MOTDEPASSE);

    $r = $db->prepare("select id, nom, region, DateDebut, DateFin, NombrePlage from etude");
    $r->execute();

    $resultats=$r->fetchAll();

    foreach ($resultats as $ligne) {
        ?>
    <?php
    if ($ligne["DateFin"]==(0000-00-00)){

        ?>

        <tr>
            <td><?php echo $ligne["nom"] ?></td>
            <td><?php echo $ligne["region"] ?></td>
            <td><?php echo $ligne["DateDebut"] ?></td>
            <td><?php echo $ligne["DateFin"] ?></td>
            <td>
                <a href="GenererCode.php?plage=<?php echo $ligne["NombrePlage"]?>"><?php echo $ligne["NombrePlage"]?></a>
            </td>
            <td><?php echo statut("$ligne[DateFin]")?></td>

            <td>
                <a href="ModifierEtudes.php?id=<?php echo $ligne["id"] ?>" class="btn btn-primary"><i class="fa fa-user-edit"></i></a>

                <a href="action/actionSupprimerEtudes.php?id=<?php echo $ligne["id"] ?>"
                   onclick="return confirm('Etes-vous sur ?')"
                   class="btn btn-danger">
                    <i class="fa fa-recycle"></i>
                </a>
                <a href="Plages.php?id=<?php echo $ligne["id"] ?>"
                   class="btn btn-warning">
                    <i class="fas fa-umbrella-beach"></i>
                </a>
            </td>
            <td>
                <a href="cloturer.php?id=<?php echo $ligne["id"] ?>" class="btn btn-outline-dark link">
                    <i class="fas fa-times-circle"></i>
                    Valider l'étude
                </a>
            </td>
        </tr>

    <?Php } ?>

        <?php
    }
    ?>

    <?php

    function statut($datefin) {
        if($datefin=="0000-00-00") {
            echo "<button type=\"button\" class=\"btn btn-outline-danger\">En cours</button> ";
        } else {
            echo "<button type=\"button\" class=\"btn btn-outline-success\">Validé</button>";

        }
    }

    ?>

        </table>

        <a href="historique.php" class="btn btn-success">
            <i class="far fa-check-circle"></i>
            Visionner les Etudes validées
        </a>

        <a href="EspeceAdmin.php" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Especes
        </a>

<?php
include_once "footer.php";
mon_footer();
?>

