<?php
class ViewHeader{

    //METHOD
    public function displayView():string{
        return '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <header>
                <nav>
                    <a href="index.php">Accueil</a>
                    <a href="account.php">Mon Compte</a>
                    <a href="category.php">Category</a>
                    <a href="deco.php">Deconnexion</a>
                </nav>
            </header>';
    }
}