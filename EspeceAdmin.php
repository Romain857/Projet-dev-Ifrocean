        <?php
        include_once "header.php";
        mon_header("EspeceAdmin");
        $id=filter_input(INPUT_POST,"id");
        ?>

        <main class="container" xmlns="http://www.w3.org/1999/html">
            <div class="narval"></div>
            <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                Inserer les espèces
            </span>
            </nav>

            <form method="post" action="action/actionAjouterEspeceAdmin.php">

                <main class="container">

                    <br><div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" maxlength="50"
                               name="nom"
                               placeholder="Nom..." required>
                    </div>

                        <a href="Etudes.php" class="btn btn-danger pull-left">
                            <i class="fal fa-long-arrow-left"></i>
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
            </form>

            <table class="table table-bordered table-hover">
            <p align="center"></p>
            <br>
            <tr>
                <th>Nom</th>
            </tr>

            <?php
            $id=filter_input(INPUT_POST,"id");

            require"config.php";
            $db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASEDEDONNEES
                ,Config::UTILISATEUR, Config::MOTDEPASSE);


            $r = $db->prepare("select id, nom from espece");

            $r->execute();

            $resultats=$r->fetchAll();

            foreach ($resultats as $ligne) {
                ?>

                <tr>
                    <td><?php echo $ligne ["nom"]?></td>
                    <td><a href="action/actionSupprimerEspece.php?id=<?php echo $ligne["id"] ?>"
                       onclick="return confirm('Etes-vous sur ?')"
                       class="btn btn-danger">
                            <i class="fas fa-fish-cooked"></i>
                        </a></td>
                </tr>

                <?php
            }
            ?>

            <?php
            include_once "footer.php";
            mon_footer();
            ?>
