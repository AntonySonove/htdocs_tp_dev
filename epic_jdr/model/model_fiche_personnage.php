<?php
class ModelFichePersonnage{
    //!attributs
    private ?string $name;
    private ?int $lp;
    private ?int $mp;
    private ?int $atk;
    private ?int $def;
    private ?int $atkm;
    private ?int $defm;
    private ?int $speed;
    private ?int $id;
    private ?PDO $bdd;

    

    //!constructor
    public function __construct() {
        $this->bdd = dbConnect();

    }
    //! getter et setter
    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): self { $this->name = $name; return $this; }

    public function getLp(): ?int { return $this->lp; }
    public function setLp(?int $lp): self { $this->lp = $lp; return $this; }

    public function getMp(): ?int { return $this->mp; }
    public function setMp(?int $mp): self { $this->mp = $mp; return $this; }

    public function getAtk(): ?int { return $this->atk; }
    public function setAtk(?int $atk): self { $this->atk = $atk; return $this; }

    public function getDef(): ?int { return $this->def; }
    public function setDef(?int $def): self { $this->def = $def; return $this; }

    public function getAtkm(): ?int { return $this->atkm; }
    public function setAtkm(?int $atkm): self { $this->atkm = $atkm; return $this; }

    public function getDefm(): ?int { return $this->defm; }
    public function setDefm(?int $defm): self { $this->defm = $defm; return $this; }

    public function getSpeed(): ?int { return $this->speed; }
    public function setSpeed(?int $speed): self { $this->speed = $speed; return $this; }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }
    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }

    public function getOneCharacter():array | string{

        try {
            
        $req=$this->getBdd()->prepare("SELECT id_character, name_character, lp, mp, atk, def, atkm, defm, speed, id_user FROM characters WHERE id_character=?");

        $req->bindParam(1,$_GET["id"],PDO::PARAM_INT);

        $req->execute();

        $res=$req->fetchAll(PDO::FETCH_ASSOC);

        return $res;

        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    


    
}

?>