<?php
    include "./model/model_connexion.php";
    include "./utils/functions.php";

    $message="";


    //* démarage $_SESSION
    session_start();
    //* verifier qu'on reçoit bien le formulaire
    if(isset($_POST["submit"])){
        //* verifier que les champs ne sont pas vides
        if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
            // //* vérifier le format de l'email
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                
                //* nettoyage des données
                $email = nettoyage($_POST["email"]);
                $password = nettoyage($_POST["password"]);
                $bdd=dbConnect();
                $data=readUserByEmail($bdd, $email);
                var_dump($data);
                if(!empty($data)){ //? vérifier si les data sont vides
                    
                    if(password_verify($password, $data[0]["mdp_user"])){//? obtenu grâce au var_dump
                        
                        //*enregistrer le login dans $_SESSION
                        $_SESSION["id_user"] = $data[0]["id_user"];
                        $_SESSION["name_user"] = $data[0]["name_user"];
                        $_SESSION["firstname_user"] = $data[0]["firstname_user"];
                        $_SESSION["email_user"] = $data[0]["email_user"];
                        print_r($data);
                        header("Location:controller_compte.php");
                    }  
                }else{
                    $message= "Login et/ou Mot de Passe incorect(s)";
                }
            }else{
                $message="email invalide";
            }
        }else{
            $message="<p>Les champs sont vides</p>";
        }
    }

    include "./controller_header.php";
    include "./view/view_connexion.php";
    include "./view/footer.php";
?>