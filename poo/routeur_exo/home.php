<?php
//Activation de la Session
session_start();

//Import des Ressources



class HomeController extends GenericController{
    private ?ViewHome $viewHome;
    private ?ModelUser $modelUser;

    //CONSTRUCTEUR
    public function __construct(?ViewHome $viewHome, ?ModelUser $modelUser){
        $this->setHeader(new ViewHeader());
        $this->setFooter(new ViewFooter());
        $this->viewHome = $viewHome;
        $this->modelUser = $modelUser;
    }
    
    //GETTER ET SETTER
    public function getViewHome(): ?ViewHome { return $this->viewHome; }
    public function setViewHome(?ViewHome $viewHome): self { $this->viewHome = $viewHome; return $this; }

    public function getModelUser(): ?ModelUser { return $this->modelUser; }
    public function setModelUser(?ModelUser $modelUser): self { $this->modelUser = $modelUser; return $this; }

    //METHOD
    //S'enregistrer
    public function signIn():string{
        //1)Vérifier qu'on reçoit le formulaire
        if(isset($_POST['submit'])){
            //2) Vérifier les champs vides
            if(empty($_POST['nickname']) || empty($_POST['email']) || empty($_POST['password'])){
                return 'Remplissez tous les champs.';
            }

            //3) Vérifier le format des données
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                return "L'Email n'est pas au bon format";
            }

            //4) Nettoyer les données
            $nickname = sanitize($_POST['nickname']);
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);

            //5) Hasher le mot de passe
            $password = password_hash($password, PASSWORD_BCRYPT);

            //6) Vérifier que l'utilisateur n'existe pas déjà en BDD
            //6.1) Donner l'email au Model
            $this->getModelUser()->setEmail($email);

            //6.2) Demander au model d'utiliser getByEmail()
            $data = $this->getModelUser()->getByEmail();

            //6.3) Vérifier si les données sont vide ou pas
            if(!empty($data)){
                return "Cet email est déjà utilisé par un utilisateur.";
            }

            //7) Enregistrer l'utilisateur en BDD
            //7.1) Donner le pseudo et le mot de passe au Model
            $this->getModelUser()->setNickname($nickname)->setPassword($password);

            //7.2) Demander au model d'utiliser add()
            $data = $this->getModelUser()->add();

            //8) Retourne un message de confirmation
            return $data; 
        }
        return '';
        
    }

    //Se Connecter
    public function signUp():string{
        //1) Vérification qu'on reçoit le formulaire de connexion
        if(isset($_POST['submitConnexion'])){
            //2) Vérification des champs vides
            if(empty($_POST['emailConnexion']) || empty($_POST['passwordConnexion'])){
                return 'Veuillez remplir tous les champs.';
            }

            //3) Vérification du format de l'email
            if(!filter_var($_POST['emailConnexion'], FILTER_VALIDATE_EMAIL)){
                return 'Email pas au bon format.';
            }

            //4) Nettoyage des données
            $email = sanitize($_POST['emailConnexion']);
            $password = sanitize($_POST['passwordConnexion']);

            //5) Récupération des données de l'utilisateur en BDD
            //5.1) Je donne au modelUser l'email à aller chercher en BDD
            $this->getModelUser()->setEmail($email);

            //5.2) On demande au ModelUSer d'aller chercher les données
            $data = $this->getModelUser()->getByEmail();

            //5.3)Je vérifie que j'ai un utilisateur enregistré
            if(empty($data)){
                return 'Login et/ou Mot de Passe incorrect.';
            }

            //6) Comparer les mot de passe
            if(!password_verify($password, $data[0]['psswrd'])){
                return 'Login et/ou Mot de Passe incorrect.';
            }

            //7) Stocker les données en $_SESSION
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['nickname'] = $data[0]['nickname'];
            $_SESSION['email'] = $data[0]['email'];

            //8) Retourner le message de confirmation
            return $_SESSION['nickname']." est connecté au site.";
        }
        return '';
    }

    public function readUsers():string{
        //1) Demander au Model d'utiliser getAll()
        $data = $this->getModelUser()->getAll();

        $usersList = '';
        //2) Boucler sur le tableau d'utilisateur
        foreach($data as $user){
            //3) Mettre en forme les données
            $usersList = $usersList."<li>{$user['nickname']} - {$user['email']}</li>";
        }
        
        //4) Retourne le formatage de mes données
        return $usersList;
    }

    public function render():void{
        //LANCEMENT DU TRAITEMENT DES DONNEES
        $message = $this->signIn();

        $messageConnexion = $this->signUp();

        $usersList = $this->readUsers();

        //FAIRE LE RENDU
        //affichage du header du site
        echo $this->getHeader()->displayView();
        //affichage du contenu main, avec les données
        echo $this->getViewHome()->setMessage($message)->setMessageConnexion($messageConnexion)->setUsersList($usersList)->displayView();
        //affichage du footer du site
        echo $this->getFooter()->displayView();
    }
}

// $home = new HomeController(new ViewHome(), new ModelUser());
// $home->render();
