<!DOCTYPE html>
<html lang="fr">
<?php
    //! déclaration des variables
    $name="";
    $firstName="";
    $email="";
    $password;
    $password2;
    $message="";
    $userList="";
    //! fonction de nettoyage des donnés
    function nettoyage($data){
        return $data=htmlentities(strip_tags(stripslashes(trim($data))));
    }
    //! script pour enregister un tutilisateur
    if(isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["firstName"]) && !empty($_POST["firstName"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["password2"]) && !empty($_POST["password2"])){
            //* vérifier le format des données
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                //* vérifier que les mots de passes correspondent
                if($_POST["password"]===$_POST["password2"]){
                    //* nettoyage des données
                    $name=nettoyage($_POST["name"]);
                    $firstName=nettoyage($_POST["firstName"]);
                    $email=nettoyage($_POST["email"]);
                    $password=nettoyage($_POST["password"]);
                    $password2=nettoyage($_POST["password2"]);
                    //* chiffrage du mot de passe
                    $password=password_hash($password,PASSWORD_BCRYPT);
                    //* communication avec la bdd
                    $bdd=new PDO("mysql:host=localhost;dbname=tasks","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
                        $message= $error->getMessage();
                    }
                }else{
                    $message="<p style='color:red'>*Les mots de passe ne correspondent pas</p>";
                }
            } else{
                $message="<p style='color:red'>*Veuillez saisir un email valides</p>";
            }
        }else{
            $message= "<p style='color:red'>*Veuillez remplir les champs obligatoires</p>";
        }
    }
    $bdd=new PDO("mysql:host=localhost;dbname=tasks","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //* préparer, executer et récupérer les données de la bdd pour la requête d'affichage des utilisateurs
    $req=$bdd->prepare("SELECT name_user, firstname_user, email_user FROM users");
    $req->execute();
    $data=$req->fetchAll();
    //* faire la boucle sur le tableau pour créer les li
    foreach($data as $user){
        $userList=$userList."<div style='border-bottom:1px solid black'><li style='list-style:none'><p>Nom : <span style='font-weight:bold'>".$user["name_user"]."</span></p><p>Prénom : <span style='font-weight:bold'>".$user["firstname_user"]."</span></p><p>E-mail : <span style='font-weight:bold'>".$user["email_user"]."</span></p></li></div>";
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <header>
            <h1>TASTK</h1>
        </header>
        <main>
            <h2>Inscription</h2>
            <form action="" method="post"></form>
                <p><input type="text" name="name" placeholder="Nom"></p>
                <p><input type="text" name="firstName" placeholder="Prénom"></p>
                <p><input type="email" name="email" placeholder="E-mail"></p>
                <p><input type="password" name="password" placeholder="Mot de passe"></p>
                <p><input type="password" name="password2" placeholder="Confirmer le mot de passe"></p>
                <p><input type="submit" name="submit" value="Inscription"></p>
                <?=$message;?>
                <ul>
                    <?=$userList;?>
                </ul>
            </form>
        </main>
       
</body>
</html>