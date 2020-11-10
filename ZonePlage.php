<?php
include_once "header.php";
mon_header("Etude");
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
    require "config.php";

    $db = new PDO("mysql:host=".config::SERVEUR.";dbname=".config::BASEDEDONNEES, config::UTILISATEUR, config::MOTDEPASSE);

    $a=$db->prepare("select * from plage where id=:id");
    $a->bindParam(":id",$id_plage);
    $a->execute();
    $resultats3=$a->fetchAll();

    $r = $db->prepare("select sum(superficie) from zone where id_plage=:id_plage");
    $r->bindParam(  ":id_plage",$id_plage);
    $r->execute();
    $resultats=$r->fetchALL();

    $e = $db->prepare("SELECT COUNT(DISTINCT id_espece) 
                                FROM nombreparespece ne 
                                JOIN zone z on ne.id_zone=z.id
                                JOIN plage p on z.id_plage=p.id
                                where p.id=:id");
    $e->bindParam(":id",$id_plage);
    $e->execute();
    $resultats2=$e->fetchAll();

    $n = $db->prepare("SELECT e.nom, sum(ne.nombre) FROM espece e 
                                JOIN nombreparespece ne on e.id=ne.id_espece 
                                JOIN zone z on ne.id_zone=z.id 
                                JOIN plage p on z.id_plage=p.id 
                                where p.id=:id
                                group BY e.id");
    $n->bindParam(":id",$id_plage);
    $n->execute();
    $resultats4=$n->fetchAll();
    ?>
        <tr>
            <td><?php echo $resultats3[0]["nom"] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $resultats[0]["sum(superficie)"] ?></td>
            <td><?php echo $resultats2[0]["COUNT(DISTINCT id_espece)"] ?></td>

        <?php
        foreach ($resultats4 as $ligne) {
        ?>

        <tr>
            <td></td>
            <td><?php echo $ligne["nom"] ?></td>
            <td><?php echo $ligne["sum(ne.nombre)"] ?></td>

            <td><?php echo $ligne["sum(ne.nombre)"] / $resultats[0]["sum(superficie)"]?></td>
            <td><?php echo $ligne["sum(ne.nombre)"] / $resultats[0]["sum(superficie)"]*$resultats3[0]["superficie"]?></td>
            <td></td>
            <td></td>
        </tr>

    <?php
    }
    ?>

    </thead>
</table>

    <a href="HistoriquePlage.php?id=<?php echo $id_etude ?>" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>



<?php

include_once "footer.php";
mon_footer();
