<?php
session_start();
include "./model/model_update_personnage.php";
include "./model/model_fiche_personnage.php";
include "./utils/functions.php";
include "./controller_header.php";
include "./view/view_update_personnage.php";

class ControllerUpdatePersonnage{
    private ?ModelUpdatePersonnage $ModelUpdatePersonnage;
    private ?ViewUpdatePersonnage $ViewUpdatePersonnage;
    private ?ModelFichePersonnage $modelFichePersonnage;

    public function __construct(ModelUpdatePersonnage $ModelUpdatePersonnage, ViewUpdatePersonnage $ViewUpdatePersonnage, ModelFichePersonnage $modelFichePersonnage){
        $this->ModelUpdatePersonnage=$ModelUpdatePersonnage;
        $this->ViewUpdatePersonnage=$ViewUpdatePersonnage;
        $this->modelFichePersonnage=$modelFichePersonnage;
    }

    public function getModelUpdatePersonnage(): ?ModelUpdatePersonnage { return $this->ModelUpdatePersonnage; }
    public function setModelUpdatePersonnage(?ModelUpdatePersonnage $ModelUpdatePersonnage): self { $this->ModelUpdatePersonnage = $ModelUpdatePersonnage; return $this; }

    public function getViewUpdatePersonnage(): ?ViewUpdatePersonnage { return $this->ViewUpdatePersonnage; }
    public function setViewUpdatePersonnage(?ViewUpdatePersonnage $ViewUpdatePersonnage): self { $this->ViewUpdatePersonnage = $ViewUpdatePersonnage; return $this; }
    public function getModelFichePersonnage(): ?ModelFichePersonnage { return $this->modelFichePersonnage; }
    public function setModelFichePersonnage(?ModelFichePersonnage $FichePersonnage): self { $this->FichePersonnage = $FichePersonnage; return $this; }


    public function updateCharacter(){
        $lp=$_POST["lp"] ??null; //? ??null sert à éviter l'erreur si lp=0
        $mp=$_POST["mp"] ??null;
        $atk=$_POST["atk"] ??null;
        $def=$_POST["def"] ??null;
        $atkm=$_POST["atkm"] ??null;
        $defm=$_POST["defm"] ??null;
        $speed=$_POST["speed"] ??null;
        // $id=$_GET["id"] ?? null;

        $modelFichePersonnage= new ModelFichePersonnage();
        $modelFichePersonnage->setLp($lp);
        $modelFichePersonnage->setMp($mp);
        $modelFichePersonnage->setAtk($atk);
        $modelFichePersonnage->setDef($def);
        $modelFichePersonnage->setAtkm($atkm);
        $modelFichePersonnage->setDefm($defm);
        $modelFichePersonnage->setSpeed($speed);
        // $modelFichePersonnage->setId($id);

        $modelUpdatePersonnage = new ModelUpdatePersonnage();
        return $modelUpdatePersonnage->Update($modelFichePersonnage);
       
    }

    public function render(){

        $message=$this->updateCharacter();
        echo $this->getViewUpdatePersonnage()->setMessage($message)->displayView();
    }

}
$updatePersonnage=new ControllerUpdatePersonnage(new ModelUpdatePersonnage(),new ViewUpdatePersonnage(),new ModelFichePersonnage());

$updatePersonnage->render();

include "./view/footer.php";
?>

