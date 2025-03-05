<?php
    class ModelUser{
        private ?int $id;
        private ?string $nickname;
        private ?string $email;
        private ?string $password;
        private ?PDO $bdd;


        //! constructor
        public function __construct(){
            $this->bdd=connect();
        }


        //! getter et setter
        public function getId(): ?int{
            return $this->id;
        }
       public function setId(int $id): ModelUser{
            $this->id=$id;
            return $this;
        }
       public function getNickname(): ?string{
            return $this->nickname;
        }
       public function setNickname(string $nickname): ModelUser{
            $this->nickname=$nickname;
            return $this;
        }
       public function getEmail(): ?string{
            return $this->email;
        }
       public function setEmail(string $email): ModelUser{
            $this->email=$email;
            return $this;
        }
       public function getPassword(): ?string{
            return $this->password;
        }
       public function setPassword(string $password): ModelUser{
            $this->password=$password;
            return $this;
        }
       public function getBdd(): ?PDO{
            return $this->bdd;
        }
       public function setBdd(PDO $bdd): ModelUser{
            $this->bdd=$bdd;
            return $this;
        }


       //! method
       public function add():?string{
            try{

                //* préparation de la requête
                $req=$this->getBdd()->prepare("INSERT INTO users (nickname,email,psswrd) VALUES (?,?,?)"); //! erreur sur $this->bdd qui doit être $this->getBdd()

                //* récupération des données de l'objet Model
                $nickname= $this->getNickname(); //! OUBLIE
                $email= $this->getEmail(); //! OUBLIE
                $password= $this->getPassword(); //! OUBLIE

                //*binding des paramètres de la requête
                $req->bindParam(1,$nickname,PDO::PARAM_STR);
                $req->bindParam(2,$email,PDO::PARAM_STR);
                $req->bindParam(3,$password,PDO::PARAM_STR);

                //* execution de la requête
                $req->execute();

                return "*Utilisateur enregistré";

            }catch(Exception $error){
                return $error->getMessage();
            }
        }


        public function getAll(): array | string {
            try{

                //* préparation de la reqête
                $req=$this->bdd->prepare("SELECT id, nickname, email, psswrd FROM users");

                //* execution de la requête
                $req->execute();

                //* récupération des données sous forme de tableau
                $data=$req->fetchAll(PDO::FETCH_ASSOC);
                
                return $data;

            }catch(Exception $error){
                return $error->getMessage();
            }
        }


        public function getByEmail(): array | string{
            try{

                //* préparation de la requête
                $req=$this->bdd->prepare("SELECT email FROM users WHERE email= ? LIMIT 1");

                //* récupération de l'email de l'objet Model
                $email= $this->getEmail(); //! oublie

                //* binding 
                $req->bindParam(1,$email,PDO::PARAM_STR); //! oublie

                //* execution de la requête
                $req->execute();

                //* récupération des données sous forme de tableau
                $data=$req->fetchAll();

                return $data;

            }catch(Exception $error){
                return $error->getMessage();
            }
        }
    }
?>