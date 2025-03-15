<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPIC JDR - accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/style/header.css">
    <link rel="stylesheet" href="./src/style/style.css">
    <link rel="stylesheet" href="./src/style/creer_personnage.css">
    <link rel="stylesheet" href="./src/style/index.css">
</head>
<body>
    <div id="container">
        <header>
            <ul class="row width100 spaceAround alignCenter">
                <li>
                    <a href="index.php"><img id="logo" src="./src/ressources/logo_epic_jdr.png" height="150" alt="logo"></a>
                </li>
                <li>
                    <ul id="dropdownMenuCreer">
                        <li class="boutonJaune sizeHeaderButton">Créer
                            <ul id="showMenuCreer" class="menuCache menuCacheAbsolute menuCachePosition">
                                <li class="boutonJaune sizeHeaderButton scale pointer">
                                    <a href="./creer_fiche_perso.html">Créer une fiche personnage</a>
                                </li>
                                <li class="boutonJaune sizeHeaderButton scale menuCachePositionLi2 pointer">
                                    <a href="./creer_partie.html">Créer une partie</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul id="dropdownMenuGerer">
                        <li class="boutonJaune sizeHeaderButton">Gérer
                            <ul id="showMenuGerer" class="menuCache menuCacheAbsolute menu menuCachePosition">
                                <li class="boutonJaune sizeHeaderButton scale pointer">
                                    <a href="./gerer_fiches_perso.html">Gerer les fiches personnages</a>
                                </li>
                                <li class="boutonJaune sizeHeaderButton scale menuCachePositionLi2 pointer">
                                    <a href="./gerer_parties.html">Gerer les parties</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="boutonJaune sizeHeaderButton scale pointer">
                    <a href="./lancer_partie.html">Lancer une partie</a>
                </li>
                <li class="boutonJaune sizeHeaderButton scale pointer">
                    <a href="./mon_compte.html">Mon compte</a>
                </li>
                <li class="boutonJaune sizeHeaderButton scale pointer">
                    <a href="./controller_deconnexion.php">Déconnexion</a>
                </li>
            </ul>
            
        </header>
    </div>