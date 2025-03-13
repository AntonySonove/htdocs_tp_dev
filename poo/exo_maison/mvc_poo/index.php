<?php
    include "./utils/utils.php";
    include "./model/modelUser.php";
    include "./view/viewHome.php";
    include "./controllerHome.php";


    $home=new ControllerHome(new ViewHome, new ModelUser);
    // var_dump($home);
    $home->render();
?>