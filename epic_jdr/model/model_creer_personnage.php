<?php
class ModelCreerPersonnage{
    private ?string $name;
    private ?int $lp;
    private ?int $mp;
    private ?int $atk;
    private ?int $def;
    private ?int $atkm;
    private ?int $defm;
    private ?int $speed;
    private ?PDO $bdd;

    public function __construct(){
        $this->bdd=dbConnect();
    }

   
    //! getter et setter
    public function getBdd(): ?PDO{
        return $this->bdd;
    }
    public function setBdd(PDO $bdd): ModelCreerPersonnage{
        $this->bdd=$bdd;
        return $this;
    }
    public function getName(): ?string{
        return $this->name;
    }
    public function setName(string $name): ModelCreerPersonnage{
        $this->name=$name;
        return $this;
    }
    public function getLp(): ?int{
        return $this->lp;
    }
    public function setLp(int $lp): ModelCreerPersonnage{
        $this->lp=$lp;
        return $this;
    }
    public function getMp(): ?int{
        return $this->mp;
    }
    public function setMp(int $mp): ModelCreerPersonnage{
        $this->mp=$mp;
        return $this;
    }
    public function getAtk(): ?int{
        return $this->atk;
    }
    public function setAtk(int $atk): ModelCreerPersonnage{
        $this->atk=$atk;
        return $this;
    }
    public function getDef(): ?int{
        return $this->def;
    }
    public function setDef(int $def): ModelCreerPersonnage{
        $this->def=$def;
        return $this;
    }
    
    public function getAtkm(): ?int{
        return $this->atkm;
    }
    public function setAtkm(int $atkm): ModelCreerPersonnage{
        $this->atkm=$atkm;
        return $this;
    }
    public function getDefm(): ?int{
        return $this->defm;
    }
    public function setDefm(int $defm): ModelCreerPersonnage{
        $this->defm=$defm;
        return $this;
    }
    public function getSpeed(): ?int{
        return $this->speed;
    }
    public function setSpeed(int $speed): ModelCreerPersonnage{
        $this->speed=$speed;
        return $this;
    }

    //! method
    public function addCharacter():?string{
        try{

            $req=$this->getBdd()->prepare("INSERT INTO characters (name_character, lp, mp, atk, def, atkm, defm, speed) VALUES (?,?,?,?,?,?,?,?)");
            $name=$this->getName();
            $lp=$this->getLp();
            $mp=$this->getMp();
            $atk=$this->getAtk();
            $def=$this->getDef();
            $atkm=$this->getAtkm();
            $defm=$this->getDefm();
            $speed=$this->getSpeed();
            
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$lp,PDO::PARAM_INT);
            $req->bindParam(3,$mp,PDO::PARAM_INT);
            $req->bindParam(4,$atk,PDO::PARAM_INT);
            $req->bindParam(5,$def,PDO::PARAM_INT);
            $req->bindParam(6,$atkm,PDO::PARAM_INT);
            $req->bindParam(7,$defm,PDO::PARAM_INT);
            $req->bindParam(8,$speed,PDO::PARAM_INT);
            $req->execute();
            
            
            return "Nouveau personnage enregistré";

        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}