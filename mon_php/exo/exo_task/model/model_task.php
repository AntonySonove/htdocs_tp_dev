<?php
    function addTask($bdd,$name_task,$content_task,$date_task){
        try{
            $req=$bdd->prepare("INSERT INTO tasks (name_task,content_task,date_task) VALUES (?,?,?)");
            //* binding des paramètres et execution de la reqête
            $req->bindParam(1,$name_task,PDO::PARAM_STR);
            $req->bindParam(2,$content_task,PDO::PARAM_STR);
            $req->bindParam(3,$date_task,PDO::PARAM_STR);
            $req->execute();
            $message="<p style='color:green'>*task créé</p>";
        }catch(EXCEPTION $error){
        return $error->getMessage();
        }
        return $message;
    }
    function taskAll($bdd){
    //* préparer, executer et récupérer les données de la bdd pour la requête d'affichage des utilisateurs
        try{
            $req=$bdd->prepare("SELECT name_task, content_task, date_task FROM tasks");
            $req->execute();
            $data=$req->fetchAll();
            return $data;   
        }catch(PDOException $error){
            return $error->getMessage();
        }
    }
    // function addCategory($bdd){
    //     try{
    //         $req=$bdd->prepare("SELECT name_category FROM categories WHERE id_category=1");
    //         $req->execute();
    //         $data=$req->fetchAll();
    //         return $data;
    //     }catch(PDOException $error){
    //         return $error->getMessage();
    //     }
    // } 
?>