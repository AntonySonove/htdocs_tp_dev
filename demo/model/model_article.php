<?php
    function articleAdd($bdd, $name, $content, $prix){
        try{
            //* envoie de la requête sql et binding
            //? requête
            $req=$bdd->prepare("INSERT INTO article (nom_article, description_article, prix_article) VALUES (?,?,?)");
            //? binding
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$content,PDO::PARAM_STR);
            $req->bindParam(3,$prix,PDO::PARAM_STR);
            //? execution de la reqête
            $req->execute();
            return $name." : ".$content.", au prix de ".$prix."€ à bien été ajouté!";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
    function articleAll($bdd){
        try{
            //* préparer, executer et récupérer les données de la bdd pour la reqête SELECT
            $req=$bdd->prepare("SELECT nom_article,description_article,prix_article FROM article");
            $req->execute();
            $data=$req->fetchAll();
            //* faire une boucle sur le tableau pour créer les li
            $articleList="";
            foreach($data as $article){
                $articleList=$articleList."<div style='border-bottom : 3px solid black'><h3>nom : ".$article["nom_article"]."</h3> <h4>description : ".$article["description_article"]."</h4><h5>prix : ".$article["prix_article"]."€</h5></div>";
            }
            return $articleList;
        }catch(PDOException $error){
            return $error->getMessage();
        }
    }
?>