<?php

function quizzList(){

    //* connexion à la bdd
    $bdd=new PDO ("mysql:host=localhost;dbname=quizz","root","",array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    try{
        //* préparation de la reqête
        $req=$bdd->prepare("SELECT title, `description` FROM quizz");

        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);


        
        foreach($res as $row){
           
            $quizzList=["titre"=>$row["title"], "description"=>$row["description"]];
            echo $json=json_encode($quizzList);
        }
        
        


        //* retourner la reponse au client
        http_response_code(200);


        $tab=["message"=>"Succsess!","code"=> 200];

        echo $json=json_encode($tab);

        return;

    }catch (EXCEPTION $error){
        http_response_code(500);
        echo json_encode(["message"=> $error->getMessage(),"code"=> 500]);
        return;
    }
}




function quizzCategory(){

    //* connexion à la bdd
    $bdd=new PDO ("mysql:host=localhost;dbname=quizz","root","",array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    try{
        //* préparation de la reqête
        $req=$bdd->prepare("SELECT title FROM category");
    
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
    
    
        
        foreach($res as $row){
           
            $quizzCategory=["categorie"=>$row["title"]];
            echo $json=json_encode($quizzCategory);
        }
        
        
    
    
        //* retourner la reponse au client
        http_response_code(200);
    
    
        $tab=["message"=>"Succsess!","code"=> 200];
    
        echo $json=json_encode($tab);
    
        return;
    
    }catch (EXCEPTION $error){
        http_response_code(500);
        echo json_encode(["message"=> $error->getMessage(),"code"=> 500]);
        return;
    }
}


function addQuizz(){

    //* acces depuis n'importe quel appareil
header("Access-Control-Allow-Origin: *");


//* format de données envoyées
header("Content-Type: application/json; charset=UTF-8");


//* méthode (GET, POST, PUT, DELETE)
header("Access-Control-Allow-Methods: POST");


//* durée de vie de la requête
header("Access-Control-Max-Age:3600");


//* entêtes autorisées
header("Access-Control-Allow-Headers: Content-type, Access-Control-Headers,Authorization, X-Requested-With");





//* controle de la methode http
if($_SERVER["REQUEST_METHOD"]!="POST"){

    //* envoie d'un message d'erreur
    http_response_code(405);
    echo json_encode(["message"=>"Methode non autorisée. POST requis.","code"=>405]);

    //* arrêt du script
    return;
}





//* récup des données
$json=file_get_contents("php://input");

//* déchiffrer les données
$data=json_decode($json);





    //* connexion à la bdd
    $bdd=new PDO ("mysql:host=localhost;dbname=quizz","root","",array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    try{
    
        $req=$bdd->prepare("INSERT INTO quizz (title, `description`) VALUES (?,?)");
        $req->bindParam(1, $_POST["titre"], PDO::PARAM_INT);
        $req->bindParam(2, $_POST["description"], PDO::PARAM_STR);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    
    
         //* retourner la reponse au client
         http_response_code(200);
        
        
         $tab=["message"=>"Succsess!","code"=> 200];
     
         echo $json=json_encode($tab);
     
         return;
    
    }catch (PDOException $error){
        http_response_code(500);
        echo json_encode(["message"=> $error->getMessage(),"code"=> 500]);
    }
    
}


// quizzList();
// quizzCategory();
addQuizz();