
<?php

include "./model/model_connexion.php";
include "./utils/functions.php";
    //* variables
    $nom="";
    $prenom="";
    $email="";
    //* démarrer la $_SESSION pour pouvoir y accéder
    session_start();
    //* définir une variable d'affichage
    $message="Coucou";
    //*vérifier qu'il y a une session et que le gogin dans session n'est pas vide
    if(isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])){
        //* modification de la variable d'affichage
        $nom="<p>".$_SESSION["name_user"]."</p>";
        $prenom="<p>".$_SESSION["firstname_user"]."</p>";
        $email="<p>".$_SESSION["email_user"]."</p>";
    }else{
        $nom="test";
    }

    include "./controller_header.php";
    include "./view/view_compte.php";
    include "./view/footer.php";

?>