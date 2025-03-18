<?php
class ModelUpdatePersonnage{
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

    public function __construct(){
        $this->bdd=dbConnect();
    }

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

    public function Update(ModelFichePersonnage $modelFichePersonnage ):?string{

        try{
            
            // $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            // $id_character=$modelFichePersonnage->getId();

            $req=$this->getBdd()->prepare("UPDATE characters SET lp= :lp, mp= :mp, atk= :atk, def= :def, atkm= :atkm, defm= :defm, speed= :speed WHERE id_character= :id_character");

            $lp=$modelFichePersonnage->getLp();
            $mp=$modelFichePersonnage->getMp();
            $atk=$modelFichePersonnage->getAtk();
            $def=$modelFichePersonnage->getDef();
            $atkm=$modelFichePersonnage->getAtkm();
            $defm=$modelFichePersonnage->getDefm();
            $speed=$modelFichePersonnage->getSpeed();
    
            $req->bindParam(":lp",$lp,PDO::PARAM_INT);
            $req->bindParam(":mp",$mp,PDO::PARAM_INT);
            $req->bindParam(":atk",$atk,PDO::PARAM_INT);
            $req->bindParam(":def",$def,PDO::PARAM_INT);
            $req->bindParam(":atkm",$atkm,PDO::PARAM_INT);
            $req->bindParam(":defm",$defm,PDO::PARAM_INT);
            $req->bindParam(":speed",$speed,PDO::PARAM_INT);
            $req->bindParam(":id_character",$GET['id'],PDO::PARAM_INT);
    
            $req->execute();

        }catch(Exception $error){
            return $error->getMessage();
        }
        
        
        

        return "<span style= 'color: green'*Le personnage à été modifié</span>";
    }
}


?>