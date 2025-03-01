<?php
    include "./utilis/functions.php";
    include "./model/model_article.php";
    //* variables d'affichage
    $message="";
    $title="Ajouter un nouvel article";
    $articleList="";

    if (isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["nom_article"]) && !empty($_POST["nom_article"]) && isset($_POST["contenu_article"]) && !empty($_POST["contenu_article"]) && isset($_POST["prix_article"]) && !empty($_POST["prix_article"])){
            //* vérifier le format des données
            if(filter_var($_POST["prix_article"], FILTER_VALIDATE_INT)){
                //? nettoyer les données
                $name=sanitize($_POST["nom_article"]);
                $content=sanitize($_POST["contenu_article"]);
                $prix=sanitize($_POST["prix_article"]);
                $bdd=dbConnect();
                $message=articleAdd($bdd, $name, $content, $prix);
            }else{
                $message="Veuillez saisir un prix";
            }
        }else{
            $message="Veuillez saisir tous les champs";
        }
    }
    include "./view/header.php";
    include "./view/view_accueil.php";
    include "./view/footer.php";
?>