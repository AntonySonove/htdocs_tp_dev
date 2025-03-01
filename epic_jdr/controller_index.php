<?php
    include "./model/model_index.php";
    include "./utils/functions.php";

    $message="";
    $messageConnexion="";

    //! inscription
    if(isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["nickname"]) && !empty($_POST["nickname"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["password2"]) && !empty($_POST["password2"])){
            //* vérifier le format des données
            if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                //* vérifier que les mots de passes correspondent
                if($_POST["password"]===$_POST["password2"]){
                    //* nettoyage des données
                    $nickname=nettoyage($_POST["nickname"]);
                    $email=nettoyage($_POST["email"]);
                    $password=nettoyage($_POST["password"]);
                    $password2=nettoyage($_POST["password2"]);
                    //* chiffrage du mot de passe
                    $password=password_hash($password,PASSWORD_BCRYPT);
                    $bdd=dbConnect();
                    $message=addUser($bdd, $nickname, $email, $password);
                    
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

    //! connexion

    //* démarage $_SESSION
    session_start();
    //* verifier qu'on reçoit bien le formulaire
    if(isset($_POST["submitConnexion"])){
        //* verifier que les champs ne sont pas vides
        if(isset($_POST["emailConnexion"]) && !empty($_POST["emailConnexion"]) && isset($_POST["passwordConnexion"]) && !empty($_POST["passwordConnexion"])){
            // //* vérifier le format de l'email
            if(filter_var($_POST["emailConnexion"],FILTER_VALIDATE_EMAIL)){
                
                //* nettoyage des données
                $email = nettoyage($_POST["emailConnexion"]);
                $password = nettoyage($_POST["passwordConnexion"]);
                $bdd=dbConnect();
                $data=readUserByEmail($bdd, $email);
                // var_dump($data);
                if(!empty($data)){ //? vérifier si les data sont vides
                    
                    if(password_verify($password, $data[0]["password_user"])){//? obtenu grâce au var_dump
                        
                        //*enregistrer le login dans $_SESSION
                        $_SESSION["id_user"] = $data[0]["id_user"];
                        $_SESSION["nickname"] = $data[0]["nickname"];
                        $_SESSION["email"] = $data[0]["email"];
                        // print_r($data);
                        header("Location:./controller_compte.php");
                    }  
                }else{
                    $messageConnexion="<p style='color:red'>Login et/ou Mot de Passe incorect(s)</p>";
                }
            }else{
                $messageConnexion="<p style='color:red'>email invalide</p>";
            }
        }else{
            $messageConnexion="<p style='color:red'>Les champs sont vides</p>";
        }
    }

    include "./view/header.php";
    include "./view/view_index.php";
    include "./view/footer.php";
?>