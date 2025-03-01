<?php
    //! fonction de création de compte
    function addUser($bdd, $nickname, $email, $password,){
        try{
        //* vérifier si l'utilisateur existe déja en bdd
        //* envoie de la requête sql
        //? pour l'email
        $req=$bdd->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
        //* binding du paramètre et execution de la requête
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->execute();
        //* récupération de la réponse de la bdd
        $data=$req->fetchAll();
        //* envoie de la requête sql si l'email n'existe pas en bdd
        if(!$data){
            //* vérifier si l'utilisateur existe déja en bdd
            //* envoie de la requête sql
            //? pour le pseudo
            $req=$bdd->prepare("SELECT nickname FROM users WHERE nickname=? LIMIT 1");
            //* binding du paramètre et execution de la requête
            $req->bindParam(1,$nickname,PDO::PARAM_STR);
            $req->execute();
            //* récupération de la réponse de la bdd
            $data=$req->fetchAll();
            //* envoie de la requête sql si l'email n'existe pas en bdd
            if(!$data){

        

                $req=$bdd->prepare("INSERT INTO users (nickname, email, password_user) VALUES (?,?,?)");
                //* binding des paramètres et execution de la reqête
                $req->bindParam(1,$nickname,PDO::PARAM_STR);
                $req->bindParam(2,$email,PDO::PARAM_STR);
                $req->bindParam(3,$password,PDO::PARAM_STR);
                $req->execute();
                $message="<p style='color:green'>*Compte utilisateur créé</p>";
            }else{
                $message="<p style='color:red'>*Ce pseudo est déjà utilisée</p>";
            }
        }else{
            $message= "<p style='color:red'>*Cette adresse mail est déjà utilisée</p>";
        } 
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
        return $message;
        }
    
    //! fonction de connection

    function readUserByEmail($bdd, $email) {
        try {
            $req=$bdd->prepare("SELECT email, password_user, nickname, id_user FROM users WHERE email=? LIMIT 1");
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data=$req->fetchAll();
            return $data;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
?>
