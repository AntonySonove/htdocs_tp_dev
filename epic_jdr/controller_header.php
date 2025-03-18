<?php


$creer='';
$gerer='';
$partie='';
$compte='';
$deco='';



if(isset($_SESSION["id_user"]) && !empty( $_SESSION["id_user"] )){
    $creer= '
        <ul id="dropdownMenuCreer">
            <li class="boutonJaune sizeHeaderButton">Créer
                <ul id="showMenuCreer" class="menuCache menuCacheAbsolute menuCachePosition">
                    <li class="boutonJaune sizeHeaderButton scale pointer">
                        <a href="./controller_creer_personnage.php">Créer une fiche personnage</a>
                    </li>
                    <li class="boutonJaune sizeHeaderButton scale menuCachePositionLi2 pointer">
                        <a href="./creer_partie.html">Créer une partie</a>
                    </li>
                </ul>
            </li>
        </ul>   
    ';

    $gerer= '
    <ul id="dropdownMenuGerer">
        <li class="boutonJaune sizeHeaderButton">Gérer
            <ul id="showMenuGerer" class="menuCache menuCacheAbsolute menu menuCachePosition">
                <li class="boutonJaune sizeHeaderButton scale pointer">
                    <a href="./controller_gerer_personnage.php">Gerer les fiches personnages</a>
                </li>
                <li class="boutonJaune sizeHeaderButton scale menuCachePositionLi2 pointer">
                    <a href="./gerer_parties.html">Gerer les parties</a>
                </li>
            </ul>
        </li>
    </ul>
    ';

    $partie= '
        <li class="boutonJaune sizeHeaderButton scale pointer">
            <a href="./lancer_partie.html">Lancer une partie</a>
        </li>
    ';

    $compte= '
    <li class="boutonJaune sizeHeaderButton scale pointer">
        <a href="./controller_compte.php">Mon compte</a>
    </li>
    ';

    $deco='
        <li class="boutonJaune sizeHeaderButton scale pointer">
            <a href="./controller_deconnexion.php">Déconnexion</a>
        </li>
    ';
}

include "./view/header.php";


