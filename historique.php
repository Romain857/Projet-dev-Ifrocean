<?php
include_once "header.php";
mon_header("historique");

?>

    <main class="container" xmlns="http://www.w3.org/1999/html">
    <div class="narval"></div>
    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Historique
            </span>

    </nav>

    <br><table class="table table-bordered table-hover">
    <tr>
        <th>Nom</th>
        <th>Région</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Nombre de plages</th>
        <th>Statut</th>
    </tr>

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
        if ($ligne["DateFin"]!=(0000-00-00)){

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
                    <a href="action/actionSupprimerEtudes.php?id=<?php echo $ligne["id"] ?>"
                       onclick="return confirm('Etes-vous sur ?')"
                       class="btn btn-danger">
                        <i class="fa fa-recycle"></i>
                    </a>
                    <a href="HistoriquePlage.php?id=<?php echo $ligne["id"] ?>"
                       class="btn btn-warning">
                        <i class="fas fa-umbrella-beach"></i>
                    </a>
                </td>
                <td>
                    <a href="ZoneEtude.php?id_etude=<?php echo $ligne ["id"]?>" class="btn btn-success pull-left">
                        <i class="far fa-abacus"></i>
                        Calcul
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

    <a href="Etudes.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>

<?php
include_once "footer.php";
mon_footer();
?>