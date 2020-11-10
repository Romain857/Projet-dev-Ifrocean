<?php
include_once "header.php";
mon_header("ZoneEtude");
$id_plage=filter_input(INPUT_GET,"id");
$id_etude=filter_input(INPUT_GET,"id_etude");
?>

    <main class="container">
        <table class="table">
        <thead>
            <tr>
                <th>Nom de la plage</th>
                <th>Nom des espèces trouvées</th>
                <th>Nombre trouvés de ces espèces </th>

                <th scope="col">Densité d'espece par plages</th>
                <th scope="col">Population</th>

                <th>Superficie etudié</th>

                <th>Nombre total d'especes trouvées</th>

            </tr>


    <?php
    require"config.php";
    $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
        ,Config::UTILISATEUR, Config::MOTDEPASSE);

    $b=$db->prepare("select sum(p.superficie) from plage p join etude et on p.id_etude=et.id where et.id=:id_etude");
    $b->bindParam(":id_etude",$id_etude);
    $b->execute();
    $resultatsb=$b->fetchAll();

    $a= $db->prepare("select * from etude where id=:id");
    $a->bindParam(  ":id",$id_etude);
    $a->execute();
    $resultats3=$a->fetchAll();

    $r = $db->prepare("select sum(z.superficie) from zone z join plage p on z.id_plage=p.id JOIN etude e on p.id_etude=e.id where e.id=:id_etude");
    $r->bindParam(  ":id_etude",$id_etude);
    $r->execute();
    $resultats=$r->fetchALL();

    $e = $db->prepare("SELECT COUNT(DISTINCT id_espece) 
                                FROM nombreparespece ne 
                                JOIN zone z on ne.id_zone=z.id
                                JOIN plage p on z.id_plage=p.id
                                JOIN etude e on p.id_etude=e.id
                                where e.id=:id");
    $e->bindParam(":id",$id_etude);
    $e->execute();
    $resultats2=$e->fetchAll();

    $n = $db->prepare("SELECT e.nom, sum(ne.nombre) FROM espece e 
                                JOIN nombreparespece ne on e.id=ne.id_espece 
                                JOIN zone z on ne.id_zone=z.id 
                                JOIN plage p on z.id_plage=p.id 
                                join etude et on p.id_etude=et.id
                                where et.id=:id
                                group BY e.id");
    $n->bindParam(":id",$id_etude);
    $n->execute();
    $resultats4=$n->fetchAll();
?>

                <td><?php echo $resultats3["0"]["nom"] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
                <td><?php echo $resultats[0]["sum(z.superficie)"] ?></td>
                <td><?php echo $resultats2[0]["COUNT(DISTINCT id_espece)"] ?></td>

            <?php
    foreach ($resultats4 as $ligne) {
    ?>

            <tr>
                <td></td>

                <td><?php echo $ligne["nom"]?></td>
                <td><?php echo $ligne["sum(ne.nombre)"] ?></td>

                <td><?php echo $ligne["sum(ne.nombre)"] / $resultats[0]["sum(z.superficie)"]?></td>
                <td><?php echo $ligne["sum(ne.nombre)"] / $resultats[0]["sum(z.superficie)"]*$resultatsb[0]["sum(p.superficie)"]?></td>

                <td></td>
                <td></td>
            </tr>


        <?php
        }
    ?>

        </thead>
        </table>

        <a href="historique.php" class="btn btn-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>

        <?php
        include_once "footer.php";
        mon_footer();
        ?>

