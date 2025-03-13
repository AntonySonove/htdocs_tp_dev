<?php
class ControllerPlayer{
    private ?ViewPlayer $viewPlayer;
    private ?ModelPlayer $modelPlayer;


    public function __construct(ViewPlayer $viewPlayer, ModelPlayer $modelPlayer){
        $this->viewPlayer = $viewPlayer;
        $this->modelPlayer = $modelPlayer;
    }


    public function getViewPlayer(): ViewPlayer{
        return $this->viewPlayer;
    }
    public function getModelPlayer(): ModelPlayer{
        return $this->modelPlayer;
    }


    public function setViewPlayer(ModelPlayer $modelPlayer):ControllerPlayer{
        $this->modelPlayer = $modelPlayer;
        return $this;
    }
    public function setModelPlayer(ModelPlayer $modelPlayer):ControllerPlayer{
        $this->modelPlayer = $modelPlayer;
        return $this;
    }





    public function signIn():?string{
        //* vérifier si on recoit le formulaire
        if(isset($_POST["submit"])){

            //* rerifier si les champs ne sont pas vides
            if(empty($_POST["nickname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["score"])){
                
                return "* Veuillez remplir tous les champs";

            }else{

                //* vérifier que l'email est au bon format
                if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

                    //* nettoyage des données
                    $pseudo=sanitize($_POST["nickname"]);
                    $email=sanitize($_POST["email"]);
                    $password=sanitize($_POST["password"]);
                    $score=sanitize($_POST["score"]);

                    //* chiffrage du mot de passe
                    $password=password_hash($password, PASSWORD_BCRYPT);

                    //* vérifier si l'email est disponible dans la bdd
                    $this->getModelPlayer()->setEmail($email);
                    $this->getModelPlayer()->getPlayerByMail();

                    if(empty($data)){

                        //*donner le pseudo le mot de passe et le score au model
                        $this->getModelPlayer()->setPseudo($pseudo);
                        $this->getModelPlayer()->setPassword($password);
                        $this->getModelPlayer()->setScore($score);

                        //* enregistrement de l'utilisateur
                        return $this->getModelPlayer()->addPlayer() ;



                    }else{

                        return "*Email déjà utilisé";
                    }


                }else{

                    return "*Mauvais format d'email";
                }
            }
        }return"";
    }



    function readUser():?string{

        $userList="";

        //* boucler pour faire apparaître la liste des utilisateurs
        foreach ($this->modelPlayer->getPlayer() as $user) {
            $userList=$userList."<li style= 'list-style: none'><div style= 'border-bottom: solid 3px black'><h3>{$user["pseudo"]}</h3><p>{$user["email"]}</p><p>Score : {$user["score"]}</p></div></li>";
        }
            $this->viewPlayer->setUserList($userList);
            return $userList;
    }



    public function render(){

        //* lancement du traitement des données
        $message=$this->signIn();
        $userList=$this->readUser();

        //* faire le rendu
        echo $this->getViewPlayer()->setMessage($message)->setUserList($userList)->displayView();
    }
}

?>