<?php
//CONTROLER DE LA PAGE D'ACCUEIL

include "./utils/utils.php";
include "./model/model_joueurs.php";
include "./view/header.php";
include "./view/view_accueil.php";
include "./view/footer.php";
include "./controller/controller_joueurs.php";

$accueil=new ControllerPlayer(new ViewPlayer, new ModelPlayer);
$accueil->render();
?>