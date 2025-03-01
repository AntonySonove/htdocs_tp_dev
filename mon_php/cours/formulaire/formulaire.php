<?php
    //!1er EXEMPLE
    // if(isset($_POST["submit"])){
    //     if(isset($_POST["box"])){
    //         foreach($_POST["box"] as $value){
    //             echo"<p>id de la box : $value</p>";
    //         }
    //     }
    //     else{
    //         echo"<p>Veuillez cocher une ou plusieurs cases</p>";
    //     }
    // }

    //! 2eme EXEMPLE
    // $_POST=[
    //     "login"=> "test",
    //     "password"=> "12345",
    //     "submit"=> "submit",
    // ];

    //* variables
    $login="";
    $message="";
    $loginInscription="";
    $messageInscription="";

    //* traitement du formulaire connexion
    // if(isset($_POST["submitConnexion"])){
    //     //? les !empty() servent à verifier que le champ n'est pas vide grace au "!"
    //     if(isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["password"]) && !empty($_POST["password"])){
    //         $login=$_POST["login"];
    //         $message="est connecté!";
    //     }
    // }
    //* traitement du formulaire Inscription
    // if(isset($_POST["submitInscription"])){
    //     //? les !empty() servent à verifier que le champ n'est pas vide grace au "!"
    //     if(isset($_POST["loginInscription"]) && !empty($_POST["loginInscription"]) && isset($_POST["passwordInscription"]) && !empty($_POST["passwordInscription"])){
    //         $loginInscription=$_POST["loginInscription"];
    //         $messageInscription="est inscrit!";
    //     }
    // }

    //! 3eme EXEMPLE
    //? fonction pour le nettoyage des données
    function nettoyage($data){
        return $data=htmlentities(strip_tags(stripslashes(trim($data))));
    }
    if(isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["email"]) && !empty ($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
            //* vérifier le format des données en utilisant filter_var() qui fonctionne grâce à des filtres
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                if(!empty($_POST["age"]) && filter_var($_POST["age"],FILTER_VALIDATE_INT) || empty($_POST["age"])){
                    //* nettoyer les données avec htmlentities() qui transforme les données en texte, strip_tags() pour supprimer les balises html et php, trim() pour supprimer les espaces en début et fin de chaine de caractère et stripslashes() pour supprimer les "/". 
                    //? A utiliser dans cet ordre :
                    // $login=htmlentities(strip_tags(stripslashes(trim($_POST["login"]))));
                    $login=nettoyage($_POST["login"]);
                    $email=nettoyage($_POST["email"]);
                    $password=nettoyage($_POST["password"]);
                        if (!empty($_POST["age"])){
                            $age=nettoyage($_POST["age"]);
                        }
                    //* SI INSCRIPTION, chiffrer le mot de passe avec password_hash(), qui permet de hacher le mot de passe
                    $password=password_hash($password,PASSWORD_BCRYPT);
                    //*communication avec la bdd
                    $bdd=new PDO("mysql:host=localhost;dbname=users","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    //* try catch pour gérer les erreurs de communication avec la bdd
                    try{
                        //! envoie de la requête sql
                        //* version simplifiée ->query() (non recommandé)
                        // $req= $bdd ->query("INSERT INTO users (`login`, email, mdp, age) VALUES ('$login', '$email', '$password', '$age')");

                        //* bonne méthode avec une reqête préparée ->prepare()
                        $req=$bdd ->prepare("INSERT INTO users (`login`, email, mdp, age) VALUES (?,?,?,?)");
                        //? completer les ? avec un binding des paramètres
                        $req->bindParam(1, $login, PDO::PARAM_STR);
                        $req->bindParam(2, $email, PDO::PARAM_STR);
                        $req->bindParam(3, $password, PDO::PARAM_STR);
                        $req->bindParam(4, $age, PDO::PARAM_INT);
                        //? executer la requête
                        $req->execute();

                        //? récupérer la réponse de la bdd sous forme de tableau assiociatif (pas utile dans le cas d'une inscription)
                        // $data=$req->fetchAll();

                        $message="youpi tu as réussi!!";
                    }catch(EXCEPTION $error){
                        $message= $error->getMessage();
                    }
                    }else{
                    $message= "veuillez saisir un nombre entier";
                }
            }else{
                $message= "veuillez saisir un e-mail valide";
            }
        }else{
            $message= "veuillez remplir les champs obligatoires";
        }
    }
    //! SELECT
    //* déclaration de la variable d'affichage
    $userList="";
    //* création de l'objet de connexion à la bdd
    $bdd=new PDO("mysql:host=localhost;dbname=users","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    try{
        //* préparer le SELECT
        $req=$bdd->prepare("SELECT `login`,email,age FROM users");
        //* executer le requête
        $req->execute();
        //*récupérer les données de la bdd
        $data=$req->fetchAll();
        //? ce qui est envoyé par la bdd est un tableau qui contient d'autres tableaux qui correspondent à un enregistrement
        print_r($data);
        //* faire une boucle sur le tableau pour créer des li
        foreach($data as $user){
            $userList=$userList."<li>{$user["login"]} : {$user["email"]} : {$user["age"]} ans</li>";
        }
    }catch(PDOException $error){
        $message= $error->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <!-- 1er EXEMPLE -->
    <!-- <form action="" method="post">
        <p><input type="text" name="nom" placeholder="Nom"></p>
        <p><input type="text" name="prenom" placeholder="Prénom"></p>
        <p><input type="checkbox" name="box[]" value="1">/1</p>
        <p><input type="checkbox" name="box[]" value="2">/2</p>
        <p><input type="checkbox" name="box[]" value="3">/3</p>
        <p><input type="checkbox" name="box[]" value="4">/4</p>
        <input type="submit" name="submit" value="Envoyer">
    </form> -->

    <!-- 2eme EXEMPLE -->
    <!-- <h2>Connexion</h2>
    <form action="" method="post">
        <p><input type="text" name="login" placeholder="Login"></p>
        <p><input type="text" name="password" placeholder="Mot de passe"></p>
        <p><input type="submit" name="submitConnexion" value="Envoyer"></p>
        <?= "<p>".$login." ".$message."</p>"; ?>
    </form>
    <h2>Inscription</h2>
    <form action="" method="post">
        <p><input type="text" name="loginInscription" placeholder="Login"></p>
        <p><input type="text" name="passwordInscription" placeholder="Mot de passe"></p>
        <p><input type="submit" name="submitInscription" value="Envoyer"></p>
            <?= "<p>".$loginInscription." ".$messageInscription."</p>"; ?>
    </form> -->

    <!-- 3eme EXEMPLE -->
    <form action="" method="post">
        <p><input type="text" name="login" placeholder="Login" required></p>
        <p><input type="text" name="email" placeholder="E-mail" required></p>
        <p><input type="age" name="age" placeholder="Age"></p>
        <p><input type="password" name="password" placeholder="Mot de passe" required></p>
        <p><input type="submit" name="submit" value="Inscription"></p>
        <?="<p>$message</p>";?>
    </form>
    <!-- SELECT -->
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?= $userList;?>
    </ul>
</body>
</html>


