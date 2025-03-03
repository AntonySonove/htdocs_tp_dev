<?php
    class ModelUser{

        //! attributs

        private ?int $id;
        private ?string $nickname;
        private ?string $email;
        private ?string $password;
        private ?PDO $bdd;


        //! constructor

        public function __construct() {
            $this->bdd = connect();
        }


        //! getter et setter

        public function getId(): ?int{
            return $this->id;
        }
        public function setId(?int $id): ModelUser{
            $this->id = $id;
            return $this;
        }


        public function getNickname(): ?string{
            return $this->nickname;
        }
        public function setNickname(?string $nickname): ModelUser{
            $this->nickname = $nickname;
            return $this;
        }


        public function getEmail(): ?string{
            return $this->email;
        }
        public function setEmail(?string $email): ModelUser{
            $this->email = $email;
            return $this;
        }


        public function getPassword(): ?string{
            return $this->password;
        }
        public function setPassword(?string $password): ModelUser{
            $this->password = $password;
            return $this;
        }


        public function getBdd(): ?PDO{
            return $this->bdd;
        }
        public function setBdd(?PDO $bdd): ModelUser{
            $this->bdd = $bdd;
            return $this;
        }


        //! method

        public function add():string{
            try{

                //* préparation de la requête
                $req= $this->getBdd()->prepare("INSERT INTO users (nickname, email, psswrd) VALUES (?,?,?)");

                //* récupération des données de l'objet Model
                $nickname= $this->getNickname();
                $email= $this->getEmail();
                $password= $this->getPassword();

                //*bindParam
                $req->bindParam("1", $nickname, PDO::PARAM_INT);
                $req->bindParam("2", $email, PDO::PARAM_INT);
                $req->bindParam("3", $password, PDO::PARAM_INT);

                //* execution de la rquête
                $req->execute();

                return "<p>$nickname à été enregistré</p>";
      
            }catch(EXCEPTION $error){
                return $error->getMessage();
            }
            
        }
       

        public function getAll() :array | string{
            try{
                //* préparer la requête
                $req= $this->bdd->prepare("SELECT nickname, email, psswrd FROM users");
                
                //*executer la requête
                $req->execute();

                //* récupération de la réponse de la bdd
                $data=$req->fetchAll(PDO::FETCH_ASSOC); //? sert a définir le format du tableau (ici un tableau assiociatif)

                return $data;

            }catch(EXCEPTION $error){
                echo $error->getMessage();
                return "";
            }
        }


        public function getByEmail() :array | string{
            try{
                //* préparer la requête
                $req= $this->bdd->prepare("SELECT id, nickname, email, psswrd FROM users WHERE email=?");

                //* récupération de l'email de l'objet Model
                $email= $this->getEmail();

                //* binding
                $req->bindParam("1", $email, PDO::PARAM_INT);
                
                //*executer la requête
                $req->execute();

                //* récupération de la réponse de la bdd
                $data=$req->fetchAll(PDO::FETCH_ASSOC);

                return $data;

            }catch(EXCEPTION $error){
                return $error->getMessage();
            }
        }

    }
    
?>