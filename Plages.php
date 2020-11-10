<?php
include_once "header.php";
mon_header("Ifrocean");
$id_etude=filter_input(INPUT_GET,"id");
?>
<main class="container"
<br><table class="table table-bordered table-hover">
    <tr>
        <th>Nom</th>
        <th>Superficie</th>
        <th>Commune</th>
        <th>Departement</th>
        <th>Code</th>
    </tr>


    <a href="AjouterPlages.php?id_etude=<?php echo $id_etude?>" class="btn btn-primary">Ajouter une Plage</a>

    <?php
    require"config.php";
    $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
        ,Config::UTILISATEUR, Config::MOTDEPASSE);

    $r = $db->prepare("select id, nom, superficie, commune, departement, code from plage where id_etude=:id_etude");
    $r->bindParam("id_etude",$id_etude);

    $r->execute();
    $resultats=$r->fetchAll();

    foreach ($resultats as $ligne){
        ?>

        <tr>
            <td><?php echo $ligne["nom"]?></td>
            <td><?php echo $ligne["superficie"] ?></td>
            <td><?php echo $ligne["commune"]?></td>
            <td><?php echo $ligne["departement"]?></td>
            <td><?php echo $ligne["code"]?></td>

            <td>
                <form method="get" action="ModifierPlages.php">
<h2 style="display: inline">
                    <input type="hidden" name="id_etude" value="<?php echo $id_etude ?>">
                    <input type="hidden" name="id_plage" value="<?php echo $ligne["id"] ?>">
                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fa fa-user-edit"></i>
                    </button>
                </form>
                <a href="action/actionSupprimerPlages.php?id=<?php echo $ligne["id"] ?>&id_etude=<?php echo $id_etude ?>"
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

