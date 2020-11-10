<?php
include_once "headerAccueil.php";
mon_header("please sign-in");
$error=filter_input(INPUT_GET,"error");
?>
<link rel="stylesheet" href="connexion.css">
<main class="container">
<div class="mx-auto" style="width: 300px;">
    <h1 xmlns="http://www.w3.org/1999/html"> <a href="#" class="text-decoration-none">Connectez-vous</a></h1>
</div>

    <nav class="navbar navbar-light bg-light">
        <div class="mx-auto" style="width: 200px;">
            <img src="60973914.png" width="200" height="120" alt="">
        </div>
        <a class="navbar-brand" href="#"></a>
    </nav>

<form method="post" action="action/VerificationAdmin.php">
    <div class="mx-auto" style="width: 200px;">
        Email
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="email" aria-label="email" aria-describedby="basic-addon2">

        </div>


    <div class="form-group">
        <div class="mx-auto" style="width: 200px;">
            Password
        </div>
        <input type="password" class="form-control" name="MotDePasse" placeholder="password" id="InputPassword">
        <span class="show-password">afficher</span>
        </div>

    <?php
    if($error!=null){
        ?>
        <p style="color: red">Email/Mot de passe incorrect</p>
        <?php
    }
    ?>

    <div class="form-group form-check">
        <div class="mx-auto" style="width: 200px;">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>

    </div>
    <main class="container">
            <div class="mx-auto" style="width: 200px;">
                    <button type="submit" class="btn btn-outline-primary">connexion</button>
            </div>
        <a href="accueil.php" class="btn btn-outline-danger pull-left">
            <i class="fal fa-long-arrow-left"></i>
            Retour
        </a>

</form>

    <script>
        $(document).ready(function(){

            $('.show-password').click(function() {
                if($(this).prev('input').prop('type') == 'password') {
                    $(this).prev('input').prop('type','text');
                    $(this).text('cacher');
                } else {
                    $(this).prev('input').prop('type','password');
                    $(this).text('afficher');
                }
            });

        });
    </script>

    <?php
    include_once "footer.php";
    mon_footer();
    ?>
