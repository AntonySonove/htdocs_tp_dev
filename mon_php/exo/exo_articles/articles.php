<!DOCTYPE html>
<html lang="fr"></html>
<?php
    //! déclaration des variables
    $name="";
    $content="";
    $prix;
    $message="";
    $articleList="";
    //! création de la fonction de nettoyage (pour les injections de code)
    function nettoyage($data){
        return $data=htmlentities(strip_tags(stripcslashes(trim($data))));
    }
    if (isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["nom_article"]) && !empty($_POST["nom_article"]) && isset($_POST["contenu_article"]) && !empty($_POST["contenu_article"]) && isset($_POST["prix_article"]) && !empty($_POST["prix_article"])){
            //* vérifier le format des données
            if(filter_var($_POST["prix_article"], FILTER_VALIDATE_INT)){
                //? nettoyer les données
                $name=nettoyage($_POST["nom_article"]);
                $content=nettoyage($_POST["contenu_article"]);
                $prix=nettoyage($_POST["prix_article"]);

                //* communication avec la bdd
                //? try catch pour gérer les erreurs de communication avec la bdd
                try{
                    $bdd=new PDO("mysql:host=localhost;dbname=articles","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    //* envoie de la requête sql et binding
                    //? requête
                    $req=$bdd->prepare("INSERT INTO article (nom_article, description_article, prix_article) VALUES (?,?,?)");
                    //? binding
                    $req->bindParam(1,$name,PDO::PARAM_STR);
                    $req->bindParam(2,$content,PDO::PARAM_STR);
                    $req->bindParam(3,$prix,PDO::PARAM_STR);
                    //? execution de la reqête
                    $req->execute();
                    $message=$name." : ".$content.", au prix de ".$prix."€ à bien été ajouté!";
                }catch(EXCEPTION $error){
                    $message=$error->getMessage();
                }
            }else{
                $message="Veuillez saisir un prix";
            }
        }else{
            $message="Veuillez saisir tous les champs";
        }
    }
    //* création de l'objet de connexion à la bdd
    $bdd=new PDO("mysql:host=localhost;dbname=articles","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //* try catch
    try{
        //* préparer, executer et récupérer les données de la bdd pour la reqête SELECT
        $req=$bdd->prepare("SELECT nom_article,description_article,prix_article FROM article");
        $req->execute();
        $data=$req->fetchAll();
        print_r($data);
        //* faire une boucle sur le tableau pour créer les li
        foreach($data as $article){
            $articleList=$articleList."<div style='border-bottom : 3px solid black'><h3>nom : ".$article["nom_article"]."</h3> <h4>description : ".$article["description_article"]."</h4><h5>prix : ".$article["prix_article"]."€</h5></div>";
        }
    }catch(PDOException $error){
        $message=$error->getMessage();
    }
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    <form action="" method="post">
        <p><input type="text" name="nom_article" placeholder="Nom de l'article"></p>
        <p><input type="text" name="contenu_article" placeholder="Contenu de l'article"></p>
        <p><input type="number" name="prix_article" step="0.01" placeholder="Prix de l'article"></p>
        <p><input type="submit" name="submit" value="Ajouter"></p>
        <?="<p>$message</p>";?>
    </form>
    <h1>liste des articles</h1>
    <ul>
        <?=$articleList;?>
    </ul>
</body>
</html>