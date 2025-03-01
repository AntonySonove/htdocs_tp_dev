<?php
    include "./model/model_compte.php";
    include "./utils/functions.php";
    
      //* variables
      $nickname="";
      $email="";
      //* démarrer la $_SESSION pour pouvoir y accéder
      session_start();
      //* définir une variable d'affichage
      $message="";
      //*vérifier qu'il y a une session et que le login dans session n'est pas vide
      if(isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])){
          //* modification de la variable d'affichage
          $message="<p>Bonjour ".$_SESSION["nickname"]."</p>";

      }else{
          $message="non connecté";
      }

    include "./view/header.php";
    include "./view/view_compte.php";
    include "./view/footer.php";
?>