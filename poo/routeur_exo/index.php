<?php
                //! ROUTEUR

//! inculde des fichiers communs à chaque routes
include "./utils/utils.php";
        
//! récupérer l'url entré par l'utilisateur
$url=parse_url($_SERVER["REQUEST_URI"]);

//! analyser l'intérieur de l'url pour récupérer le path (partie de l'url se trouvant apreès le nomde domaine)
isset($url["path"]) ? $path = $url["path"] : $path="/";

//!comparer le path obtenu avec les routes mise en place

//* pour la page d'accueil
switch($path){
    case "/htdocs_tp_dev/poo/routeur/":
          
        $home=new ControllerHome(new ViewHome(), new ModelUser());
        $home->render();
        break;

    case "/htdocs_tp_dev/poo/routeur/monCompte":
        
        break;

//* pour la page de compte
    default:
        echo"<h1>404 Not found</h1>";
        break;
}

?>