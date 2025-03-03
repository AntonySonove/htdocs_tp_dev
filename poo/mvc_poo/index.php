<?php
    include "./utils/utils.php";
    include "./model/modelUser.php";
    include "./view/viewHome.php";
    include "./controllerHome.php";


    //* créer un objet controller, puis faire le rendu de la page
    $home=new ControllerHome(new ViewHome(),new ModelUser()); 
    $home->render();
?>