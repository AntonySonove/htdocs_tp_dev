<?php
class ViewHeader {
    public function displayView():string{
        return '
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <header>
                    <a href="./controllerHome.php">Acceuil</a>
                    <a href="./controllerCategory.php">Catégorie</a>
                    <a href="./controllerAccount.php">Compte</a>
                    <a href="#">Déconnection</a>
                </header>
        ';
    }
}
?>