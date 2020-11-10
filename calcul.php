<?php
include_once "header.php";
mon_header("accueil");
?>

<form method="post" action="action/actionCalcul.php"
<div class="form-group">
    <div class="raw">
        <div class="col-sm"
        <label for="titre">latitude a</label>
        <input type="number" class="form-control" id="nom" maxlength=""
               name="latitude"
               placeholder="nom..." required
    </div>
    <div class="col-sm"
    <label for="titre">longitude a</label>
    <input type="number" class="form-control" id="nom" maxlength=""
           name="longitude"
           placeholder="nom..." required
</div>
</div>
</form>



</div>
<td><echo><button type="submit" class="btn btn-primary pull-right">Enregistrer</button </echo></td>

<?php
include_once "footer.php";
mon_footer();
?>
