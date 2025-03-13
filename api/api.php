<?php


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





//* exploiter les données
    //* par exemple une inscription (formulaire)
if (empty($data->nickname) || empty($data->email) || empty($data->password)){

    //* envoie d'une réponse
    http_response_code(400);
    $response=["message"=>"Données manquantes","code"=>400];
    echo json_encode($response);
    return;
}

if(!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
    http_response_code(400);
    $response=["message"=>"Mauvais format d'email","code"=>400];
    echo json_encode($response);
    return;
}

$nickname=htmlentities(strip_tags(stripcslashes(trim($data->nickname))));
$email=htmlentities(strip_tags(stripcslashes(trim($data->email))));
$password=htmlentities(strip_tags(stripcslashes(trim($data->password))));

$password=password_hash($password, PASSWORD_BCRYPT);

$bdd=new PDO ("mysql:host=localhost;dbname=users","root","",array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try{

    $req=$bdd->prepare("SELECT id, nickname, email, psswrd FROM users WHERE email=?");
    $req->bindParam(1, $email, PDO::PARAM_STR);
    $req->execute();
    $data=$req->fetch(PDO::FETCH_ASSOC);

    if(!empty($data)){
        http_response_code(409);
        echo json_encode(["message"=>"E-mail déjà utilisée","code"=>409]);
        return;
    }

    $req=$bdd->prepare("INSERT INTO users (nickname, email, psswrd) VALUES (?,?,?)");
    $req->bindParam(1, $nickname, PDO::PARAM_STR);
    $req->bindParam(2, $email, PDO::PARAM_STR);
    $req->bindParam(3, $password, PDO::PARAM_STR);
    $req->execute();


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
    echo json_encode(["message"=> $error->getMessage(),"code"=>500]);
    return;
    
}




?>