<?php
    $nav="<a href='controller_connexion.php'>Connexion</a>";
    if(isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])){
        $nav="<a href='controller_compte.php'>Mon compte</a><a href='controller_deconnexion.php'>Deconnexion</a>";
    }
    include "./view/header.php";
?>