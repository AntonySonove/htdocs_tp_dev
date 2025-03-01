<?php
    //* démarrage de la session
    session_start();
    //* destruction de la session enregistrée dans $_SESSION
    session_destroy();
    //* redirection
    header("location:index.php");
?>