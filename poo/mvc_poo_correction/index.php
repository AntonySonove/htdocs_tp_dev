<?php
//IMPORT DES RESSOURCES
include './env.php';
include './utils/utils.php';
include './View/viewHome.php';
include './Model/modelUser.php';
include './Controller/homeController.php';

//CREER UN OBJET CONTROLLER, PUIS FAIRE LE RENDU DE LA PAGE
$home = new HomeController(new ViewHome(),new ModelUser());
$home->render();