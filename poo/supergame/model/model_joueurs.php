<?php
//MODEL POUR LA TABLE JOUEURS

class ModelPlayer{

    //! attributs
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private?int $score;
    private ?PDO $bdd;


    //! constructor
    public function __construct(){
        $this->bdd = connect();
    }


    //! getter et setter
    public function getBdd():?PDO{
        return $this->bdd;
    }
    public function getId(): ?int{
        return $this->id;
    }
    public function getPseudo(): ?string{
        return $this->pseudo;
    }
    public function getEmail(): ?string{
        return $this->email;
    }
    public function getPassword(): ?string{
        return $this->password;
    }
    public function getScore(): ?int{
        return $this->score;
    }



    public function setBdd(?PDO $bdd): ModelPlayer{
        $this->bdd = $bdd;
        return $this;
    }
    public function setId(?int $id): ModelPlayer{
        $this->id = $id;
        return $this;
    }
    public function setPseudo(?string $pseudo): ModelPlayer{
        $this->pseudo = $pseudo;
        return $this;
    }
    public function setEmail(?string $email): ModelPlayer{
        $this->email = $email;
        return $this;
    }
    public function setPassword(?string $password): ModelPlayer{
        $this->password = $password;
        return $this;
    }
    public function setScore(?int $score): ModelPlayer{
        $this->score = $score;
        return $this;
    }



    //! method
    public function addPlayer():string{

        try{
            //* préparation de la requête
            $req=$this->getBdd()->prepare("INSERT INTO players (pseudo, email, score, psswrd) VALUES (?,?,?,?)");

            //*récupération des données de l'objet ModelPlayer
            $pseudo=$this->getPseudo();
            $email=$this->getEmail();
            $score=$this->getScore();
            $password=$this->getPassword();

            //* binding
            $req->bindValue(1, $pseudo, PDO::PARAM_STR);
            $req->bindValue(2, $email, PDO::PARAM_STR);
            $req->bindValue(3, $score, PDO::PARAM_INT);
            $req->bindValue(4, $password, PDO::PARAM_STR);

            //*execution de la requête
            $req->execute();

            return "*{$this->getPseudo()} à été enregistré en BDD!";


        }catch(Exception $error){
            return $error->getMessage();
        }
    }


    public function getPlayer():array | string{
        try{
            //*préparation de la requête
            $req=$this->getBdd()->prepare("SELECT pseudo, email, score FROM players");

            //* execution de la requête
            $req->execute();

            //* récupération des données sous forme de tableau
            $data=$req->fetchAll(PDO::FETCH_ASSOC);

            return $data;


        }catch(Exception $error){
            return $error->getMessage();
        }
    }
    
    
    public function getPlayerByMail():array | string{
        try{
            $req=$this->getBdd()->prepare("SELECT pseudo, email, score FROM players WHERE email=?");

            //* récupération de l'email de l'objet ModelPlayer
            $email=$this->getEmail();
            
            //* binding
            $req->bindParam(1, $email, PDO::PARAM_STR);
            
            //* execution de la requête
            $req->execute();
            
            //* récupération des données sous forme de tableau
            $data=$req->fetchAll(PDO::FETCH_ASSOC);
            
            return $data;


        }catch(Exception $error){
            return $error->getMessage();
        }
    }

}
?>