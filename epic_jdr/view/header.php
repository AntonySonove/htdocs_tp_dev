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
    <link rel="stylesheet" href="./src/style/index.css">
</head>
<body>
    <div id="container">
        <header>
            <nav>
                <!-- <a href="index.php"><img id="logo" src="./src/ressources/logo_epic_jdr.png" height="150" alt="logo"></a> -->
                <ul id="dropdownMenuCreer">
                    <li>créer</li>
                        <ul id="showMenuCreer" class="menuCache menuCacheAbsolute">
                            <li class="ulLi flexLi"><a href="./creer_fiche_perso.html">créer une fiche personnage</a></li>
                            <li class="ulLi flexLi"><a href="./creer_partie.html">créer une partie</a></li>
                        </ul>
                </ul>
                <ul id="dropdownMenuGerer">
                    <li>gérer</li>
                        <ul id="showMenuGerer" class="menuCache menuCacheAbsolute">
                            <li class="ulLi flexLi"><a href="./gerer_fiches_perso.html">gerer les fiches personnages</a></li>
                            <li class="ulLi flexLi"><a href="./gerer_parties.html">gerer les parties</a></li>
                        </ul>
                </ul>
                <a href="./lancer_partie.html">lancer une partie</a>
                <a href="./mon_compte.html">mon compte</a>
                <a href="./controller_deconnexion.php">déconnexion</a>
            </nav>
        </header>