<?php

//* acces depuis n'importe quel appareil
header("Access-Control-Allow-Origin: *");


//* format de données envoyées
header("Content-Type: application/json; charset=UTF-8");


//* méthode (GET, POST, PUT, DELETE)
header("Access-Control-Allow-Methods: GET");


//* durée de vie de la requête
header("Access-Control-Max-Age:3600");


//* entêtes autorisées
header("Access-Control-Allow-Headers: Content-type, Access-Control-Headers,Authorization, X-Requested-With");





//* controle de la methode http
if($_SERVER["REQUEST_METHOD"]!="GET"){

    //* envoie d'un message d'erreur
    http_response_code(405);
    echo json_encode(["message"=>"Methode non autorisée. GET requis.","code"=>405]);

    //* arrêt du script
    return;
}



//* récup des données
$json=file_get_contents("php://input");

//* déchiffrer les données
$data=json_decode($json);




$bdd=new PDO ("mysql:host=localhost;dbname=users","root","",array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try{

    if(empty($_GET["email"])){
        http_response_code(400);
        $response=["message"=>"Données manquantes","code"=>400];
        echo json_encode($response);
        return;
    }


$req=$bdd->prepare("SELECT nickname, email FROM users WHERE email=?");
$req->bindParam(1 , $_GET["email"], PDO::PARAM_STR);
$req->execute();
$res=$req->fetchAll(PDO::FETCH_ASSOC);

if($_GET["email"]!=$res[0]["email"]){

    http_response_code(400);
    $response=["message"=>"Aucun e-mail correspondant","code"=>400];
    echo json_encode($response);
    return;
    

}

echo $json=json_encode($res);


//* retourner un message au client (pas de return)
//* encoder le code repose HTTP  

http_response_code(200);

//* tableau assiociatif de ma réponse
$tab=["message"=>"succsess!", "code"=>"200"];

//* chiffrage de la réponse
$json=json_encode($tab);

//* affichage du json (ce qui retourne la réponse au client)
echo $json;

//* arrêt du script
return;


}catch(Exception $error){
http_response_code(500);
echo json_encode(["message"=> $error->getMessage(),"code"=> 500]);
return;
}



?>