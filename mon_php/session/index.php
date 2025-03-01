<!DOCTYPE html>
<html lang="fr"></html>
<?php
    //* démarage $_SESSION
    session_start();
    //* verifier qu'on reçoit bien le formulaire
    if(isset($_POST["submit"])){
        //*enregistrer le login dans $_SESSION
        $_SESSION["login"]=$_POST["login"];
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESSION</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <a href="utilisateur.php">Compte utilisateur</a>
    <a href="deconnexion.php">Déconnexion</a>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>
</html>