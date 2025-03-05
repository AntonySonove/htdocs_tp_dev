<?php
    class ControllerHome{

        //! attributs
        private ?ViewHome $viewHome;
        private ?ModelUser $modelUser;


        //! constructor
        public function __construct(ViewHome $viewHome, ModelUser $modelUser){
            $this->viewHome = $viewHome;
            $this->modelUser = $modelUser;
        }


        //! getter et setter
        public function getViewHome():ViewHome{
            return $this->viewHome;
        }
        public function getModelUser(): ModelUser{
            return $this->modelUser;
        }
        public function setViewHome(ViewHome $viewHome): ControllerHome{
            $this->viewHome = $viewHome;
            return $this;
        }
        public function setModelUser(): ControllerHome{
            $this->modelUser = new ModelUser();
            return $this;
        }


        //! method
        public function signIn():?string{

            //* vérifier si on reçoit le formulaire d'inscription
            if(isset($_POST["submit"])){
                
                //* vérifier si les champs sont remplis
                if(empty($_POST["nickname"]) || empty($_POST["email"]) || empty($_POST["password"])){
                    
                    return "<span style='color:red'>*Les champs sont vide<span>";

                }else{
                    
                    //* vérifier que l'email est au bon format
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        
                        //* nettoyage des données
                        $nickname=sanitize($_POST["nickname"]);
                        $email=sanitize($_POST["email"]);
                        $password=sanitize($_POST["password"]);

                        //* chiffrage du mot de passe
                        $password=password_hash($password, PASSWORD_BCRYPT); //! mal écrit (password_hash($password, PASSWORD_BCRYPT);)

                        //* vérifier si l'email est disponnible dans la bdd en donnant l'email au model
                        $this->getModelUser()->setEmail($email); //! oublie
                        
                        $data=$this->getModelUser()->getByEmail();
                        if (empty($data)){

                            //* donner le pseudo et le mot de passe au model
                            $this->getModelUser()->setNickname($nickname); //! oublie
                            $this->getModelUser()->setPassword($password); //! oublie

                            //* enregistrement de l'utilisateur
                            $this->getModelUser()->add();

                            return "<span style= 'color:green'> *Utilisateur enregistré</span>";
                            
                        }else{

                            return "<span style='color:red'>*E-mail déjà utilisé</span>";
                        }

                    }else{

                        return "<span style='color:red'>*Mauvais format d'e-mail</span>";
                    }  
                }
            }
            return "";
        }


        public function readUser():?string{

            $userList="";

            foreach ($this->modelUser->getAll() as $user){
                $userList=$userList."<li>Pseudo : {$user["nickname"]} | E-mail : {$user["email"]}</li>";
            }
            $this->viewHome->setUserList($userList);
            return $userList;
        }


        public function render(){
           
            //* lancement du traitement des données
           $message=$this->signIn();
           $userList=$this->readUser(); 

           //* faire le rendu
           echo $this->getViewHome()->setMessage($message)->setUserList($userList)->displayView(); //! je n'ai toujours pas compris le fonctionnement
            
        }
    }
    
?>