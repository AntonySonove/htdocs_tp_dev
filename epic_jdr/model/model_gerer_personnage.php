<?php
// session_start();
class ModelGererPersonnage{
    //! attributs
    private ?PDO $bdd;

    //! constructor
    public function __construct() {
        $this->bdd = dbConnect();
    }

    //! getter et setter
    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }

    //! method
    public function getAll(): array | string{

        try {

            $req=$this->getBdd()->prepare("SELECT name_character,id_character FROM characters WHERE id_user=?");
    
            $req->bindParam(1,$_SESSION['id_user'],PDO::PARAM_INT);
    
            $req->execute();
    
            $res= $req->fetchAll(PDO::FETCH_ASSOC);
    
            return $res;
            
        }catch(PDOException $error){
            return $error->getMessage();
        }
    }
}
?>




