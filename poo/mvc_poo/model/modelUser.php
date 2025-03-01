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
            $this->bdd = new PDO("mysql:host=localhost;dbname=users");
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


        public function getBdd(): ?string{
            return $this->bdd;
        }
        public function setBdd(?string $bdd): ModelUser{
            $this->bdd = $bdd;
            return $this;
        }


        //! method

        public function add():string{
            try{
                
                $req=$this->getBdd()->prepare("INSERT INTO users (nickname, email, pssword) VALUES (?,?,?)");
                //* binding des paramètres et execution de la reqête
                $req->bindParam(1,$this->getNickname(),PDO::PARAM_STR);
                $req->bindParam(2,$this->getEmail(),PDO::PARAM_STR);
                $req->bindParam(3,$this->getPassword(),PDO::PARAM_STR);
                $req->execute();
                $message="<p style='color:green'>*Compte utilisateur créé</p>";
                
                
            }catch(EXCEPTION $error){
                return $error->getMessage();
            }
            return $message;
        }
        // return "<p style='color: green'>utilisateur enregistré</p>";
        // return "<p style='color: red'>erreur</p>";

        
    }
    
?>