<?php
function addUser($bdd, $name, $firstName, $email, $password,){
    try{
    //* vérifier si l'utilisateur existe déja en bdd
    //* envoie de la requête sql
    $req=$bdd->prepare("SELECT email_user FROM users WHERE email_user=? LIMIT 1");
    //* binding du paramètre et execution de la requête
    $req->bindParam(1,$email,PDO::PARAM_STR);
    $req->execute();
    //* récupération de la réponse de la bdd
    $data=$req->fetchAll();
    //* envoie de la requête sql si l'email n'existe pas en bdd
    if(!$data){
        $req=$bdd->prepare("INSERT INTO users (name_user, firstname_user, email_user, mdp_user) VALUES (?,?,?,?)");
        //* binding des paramètres et execution de la reqête
        $req->bindParam(1,$name,PDO::PARAM_STR);
        $req->bindParam(2,$firstName,PDO::PARAM_STR);
        $req->bindParam(3,$email,PDO::PARAM_STR);
        $req->bindParam(4,$password,PDO::PARAM_STR);
        $req->execute();
        $message="<p style='color:green'>*Compte utilisateur créé</p>";
    }else{
        $message= "<p style='color:red'>*Cette adresse mail est déjà utilisée</p>";
    } 
    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
    return $message;
    }
function userAll($bdd){
     //* préparer, executer et récupérer les données de la bdd pour la requête d'affichage des utilisateurs
     try{
        $req=$bdd->prepare("SELECT name_user, firstname_user, email_user FROM users");
        $req->execute();
        $data=$req->fetchAll();
        return $data;
    }catch(PDOException $error){
        return $error->getMessage();
    }
}
?>