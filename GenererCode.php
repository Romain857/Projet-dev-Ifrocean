<?php
include_once "header.php";
mon_header("GenererCode");


$nbrplages=filter_input(INPUT_GET,"plage");

//var_dump($code);

?>
<main class="container">

    <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
        <i class=""></i>
        Generer
    </a>
    <br>

    <div class="collapse multi-collapse" id="multiCollapseExample1">
        <?php
for($i=0; $i<$nbrplages ;$i++) {

    $characts = 'abcdefghijklmnopqrstuvwxyz';
    $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characts .= '1234567890&';
    $code_aleatoire = '';
    for ($j = 0; $j < 10; $j++) {
        $code_aleatoire .= $characts[rand() % strlen($characts)];
    }
    echo "<b> ", ($i+1) ," </b>",  $code_aleatoire,"<br>";
}


?>
</div>
    <p align="center"></p>
    <a href="Etudes.php" class="btn btn-danger pull-left">
        <i class="fal fa-long-arrow-left"></i>
        Retour
    </a>

<?php
include_once "footer.php";
mon_footer();
?>

