<?php
    //* démarrage de la session
    session_start();
    //* destruction de la session enregistrée dans $_SESSION
    session_destroy();
    //* redirection
    header("location:controller_accueil.php");
    exit();
?>