<?php
    class ControllerHome extends controllerGeneric{
        private ?ViewHome $viewHome;
        private ?ModelUser $userModel;
        


        public function __construct(?ViewHome $viewHome,?ModelUser $userModel) {
            $this->viewHome = $viewHome;
            $this->userModel = $userModel;
            $this->setViewHeader(new ViewHeader);
            $this->setViewFooter(new ViewFooter);
        }


        public function getViewHome():?ViewHome {
            return $this->viewHome;
        }
        public function setViewHome(?ViewHome $viewHome) {
            $this->viewHome = $viewHome;
            return $this;
        }


        public function getModelUser():?ModelUser {
            return $this->userModel;
        }
        public function setModelUser(?ModelUser $userModel) {
            $this->userModel = $userModel;
            return $this;
        }


        public function signIn():string{

            //* vérifier qu'on reçoit le formulaire
            if(isset($_POST["submit"])){

                //* vérifier que les données ne sont pas vides
                // if(isset($_POST["nickname"]) && !empty($_POST["nickname"]) && isset($_POST["password"]) && !empty($_POST["password"])){

                //? autre méthode : 
                if(empty($_POST["nickname"]) || empty($_POST["email"]) || empty($_POST["password"])){
                    
                    return "les champs sont vides";
                    
                } else{
                    //* vérifier le format des données
                    if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                    
                        //* nettoyage des données
                        $nickname=sanitize($_POST["nickname"]);
                        $email=sanitize($_POST["email"]);
                        $password=sanitize($_POST["password"]);

                        //* chiffrage du mot de passe
                        $password=password_hash($password(),PASSWORD_BCRYPT);

                        //* donner l'email au model
                        $this->getModelUser()->setEmail($email);

                        //* demander au model d'utiliser getByEmail()
                        $data=$this->getModelUser()->getByEmail();

                        //* vérifier si les données sont vide
                    
                        if(empty($data)){

                            //* enregistrement de l'utilisateur
                            //* donner le pseudo et le mot de passe au model
                            $this->getModelUser()->setNickname($nickname)->setPassword($password);

                            //* demander au model d'utiliser add()
                            $data=$this->getModelUser()->add();

                            //* retourner un message de confirmation
                            return $data;
                        }else{
                        return "E-mail déjà utilisé";
                        }
                    } else{
                        return "mauvais format d'email";
                    } 
                }
            }
            return "";
        }
    
        public function readUser():string{
            $userList="";
            $data=$this->getModelUser()->getAll();

            foreach($data as $user){
                $userList=$userList."<li>{$user['nickname']} - {$user['email']}</li>";
            }
            return $userList;
        }
    

        public function render(){

            //* lancement du traitement des données
            $message=$this->signIn();

            $userList=$this->readUser();

            //* faire le rendu
            echo $this->getViewHeader()->displayView();
            echo $this->getViewHome()->setMessage($message)->setUserList($userList)->displayView();
            echo $this->getViewFooter()->displayView();
        }
    }
    

            
    
    




?>