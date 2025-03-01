<?php
    //* démarrer la $_SESSION pour pouvoir y accéder
    session_start();
    //* définir une variable d'affichage
    $message="Coucou";
    //*vérifier qu'il y a une ssession et que le login dans session n'est pas vide
    if(isset($_SESSION["login"]) && !empty($_SESSION["login"])){
        //* modification de la variable d'affichage
        $message=$_SESSION["login"];
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <a href="utilisateur.php">Compte utilisateur</a>
    <a href="deconnexion.php">Déconnexion</a>
    <?="<h2>$message</h2>";?>
</body>
</html>