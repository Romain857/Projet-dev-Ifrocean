<?php
include_once "headerAccueil.php";
mon_header("IFROCEAN");
$error=filter_input(INPUT_GET,"error");
?>
    <main class="container">
    <br>
    <br>
    <br>
    <br>

    <table class="table">
        <tr>
            <th>Code a entrer pour acceder à la zone :</th>
        </tr>

    </table>

    <form method="post" action="action/VerificationCode.php">
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" maxlength="50"
                   name="code"
                   placeholder="Code..." required>
        </div>

        <?php
            if ($error != NULL){
                ?>
                <p style="color: red">Le code est faux</p>
            <?php
            }
            ?>

    <br>
        <a href="accueil.php" class="btn btn-outline-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>

<?php
include_once "footer.php";
mon_footer();
?>