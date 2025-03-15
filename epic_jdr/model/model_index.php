<?php
class ModelIndex{
    //! attributs
    private ?int $id;
    private ?string $nickname;
    private ?string $email;
    private ?string $password;
    private ?string $password2;
    private ?PDO $bdd;

    //! constructor
    public function __construct(){
        $this->bdd=dbConnect();
    }

    //! getter et setter
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getNickname(): ?string { return $this->nickname; }
    public function setNickname(?string $nickname): self { $this->nickname = $nickname; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): self { $this->email = $email; return $this; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(?string $password): self { $this->password = $password; return $this; }

    public function getPassword2(): ?string { return $this->password2; }
    public function setPassword2(?string $password2): self { $this->password2 = $password2; return $this; }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }

    //! method

    public function addUser():?string{

        try{

            //* préparation de la requête
            $req=$this->getBdd()->prepare("INSERT INTO users (nickname,email,password_user) VALUES(?,?,?)");

            //* récupération des données entrées par l'utilisateur
            $nickname=$this->getNickname();
            $email=$this->getEmail();
            $password=$this->getPassword();

            //* binding (en récupérant les données grâce aux setter)
            $req->bindParam(1, $nickname, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $password, PDO::PARAM_STR); 

            //*exétuter la requete
            $req->execute();

            return "<span style= 'color: green'>*Utilisateur enregistré</span>";

        }catch(PDOException $error){
            return $error->getMessage();
        }
    }

        
    public function getByEmail():array | string{
        try{
    
            $req=$this->getBdd()->prepare("SELECT id_user,nickname,email,password_user FROM users WHERE email=?");
    
            $email=$this->getEmail();
            
    
            $req->bindParam(1,$email,PDO::PARAM_STR);
            $req->execute();
            $dataEmail=$req->fetchAll(PDO::FETCH_ASSOC);
    
            return $dataEmail;
    
        }catch(Exception $error){
            return $error->getMessage();
        }
    } 

    public function getByNickname():array | string{
        try{
    
            $req=$this->getBdd()->prepare("SELECT id_user,nickname,email FROM users WHERE nickname=?");
    
            $nickname=$this->getNickname();
    
            $req->bindParam(1,$nickname,PDO::PARAM_STR);
            $req->execute();
            $dataNickname=$req->fetchAll(PDO::FETCH_ASSOC);
    
            return $dataNickname;
    
        }catch(Exception $error){
            return $error->getMessage();
        }
    }  
}
?>
