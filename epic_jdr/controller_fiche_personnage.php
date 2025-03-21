<?php
session_start();
include "./utils/functions.php";
include "./model/model_fiche_personnage.php";
include "./controller_header.php";
include "./view/view_fiche_personnage.php";

class ControllerFichePersonnage{
    //! attributs
    private ?ModelFichePersonnage $modelFichePersonnage;
    private ?ViewFichePersonnage $viewFichePersonnage;

    //! constructor
    public function __construct(ModelFichePersonnage $modelFichePersonnage, ViewFichePersonnage $viewFichePersonnage){
        $this->modelFichePersonnage = $modelFichePersonnage;
        $this->viewFichePersonnage = $viewFichePersonnage;
    }

    //! getter et setter
    public function getModelFichePersonnage(): ?ModelFichePersonnage { return $this->modelFichePersonnage; }
    public function setModelFichePersonnage(?ModelFichePersonnage $modelFichePersonnage): self { $this->modelFichePersonnage = $modelFichePersonnage; return $this; }

    public function getViewFichePersonnage(): ?ViewFichePersonnage { return $this->viewFichePersonnage; }
    public function setViewFichePersonnage(?ViewFichePersonnage $viewFichePersonnage): self { $this->viewFichePersonnage = $viewFichePersonnage; return $this; }

    //! method
    public function displayCharacter():array | string{

        $character="";

        foreach($this->modelFichePersonnage->getOneCharacter() as $row){
            $character=$character."
            <div id=fichePersonnage class='divJaune column gap5'>
                <h2>$row[name_character]</h2>
                <div class='row spaceBetween'><p>Points de vie : </p><p>$row[lp]</p></div>
                <div class='row spaceBetween'><p>Points de magie : </p><p>$row[mp]</p></div>
                <div class='row spaceBetween'><p>Attaque : </p><p>$row[atk]</p></div>
                <div class='row spaceBetween'><p>Défense : </p><p>$row[def]</p></div>
                <div class='row spaceBetween'><p>Attaque magique : </p><p>$row[atkm]</p></div>
                <div class='row spaceBetween'><p>Défense magique : </p><p>$row[defm]</p></div>
                <div class='row spaceBetween'><p>Vitesse : </p><p>$row[speed]</p></div>
                <div class='row justifyCenter'>
                <a class= 'boutonJaune' href='./controller_update_personnage.php?id=$row[id_character]'>Modifier</a>
                </div>
            ";
        }
        $this->viewFichePersonnage->setCharacter($character);
        
        return $character;

    }
  

    public function render(){

        $character=$this->displayCharacter();

        echo $this->getViewFichePersonnage()->setCharacter($character)->displayView();
        
        
       
    }
    
}

$fichePersonnage=new ControllerFichePersonnage(new ModelFichePersonnage(), new ViewFichePersonnage());

$fichePersonnage->render();



include "./view/footer.php";

// ->setMp($mp)->setAtk($atk)->setDef($def)->setAtkm($atkm)->setDefm($defm)->setSpeed($speed)

// || empty($_POST["mp"]) || empty($_POST["atk"]) || empty($_POST["def"]) || empty($_POST["atkm"]) || empty($_POST["defm"]) || empty($_POST["speed"])
?>






