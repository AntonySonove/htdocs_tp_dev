<?php
    session_start();
    include "./model/model_gerer_personnage.php";
    include "./utils/functions.php";
    include "./controller_header.php";
    include "./view/view_gerer_personnage.php";

class ControllerGererPersonnage{

    //! attributs
    private ?ModelGererPersonnage $modelGererPersonnage;
    private ?ViewGererPersonnage $viewGererPersonnage;

    //! constructor
    public function __construct(ModelGererPersonnage $modelGererPersonnage,ViewGererPersonnage $viewGererPersonnage) {
        $this->modelGererPersonnage = $modelGererPersonnage;
        $this->viewGererPersonnage = $viewGererPersonnage;
    }

    //! getter et setter


    public function getModelGererPersonnage(): ?ModelGererPersonnage { return $this->modelGererPersonnage; }
    public function setModelGererPersonnage(?ModelGererPersonnage $modelGererPersonnage): self { $this->modelGererPersonnage = $modelGererPersonnage; return $this; }

    public function getViewGererPersonnage(): ?ViewGererPersonnage { return $this->viewGererPersonnage; }
    public function setViewGererPersonnage(?ViewGererPersonnage $viewGererPersonnage): self { $this->viewGererPersonnage = $viewGererPersonnage; return $this; }

    public function readCharacter():string{
        $characterList="";

        foreach($this->modelGererPersonnage->getAll() as $row){
            $characterList=$characterList."<article class= 'divJaune scale pointer textCenter'><a href='./controller_fiche_personnage.php' class= aSize>$row[name_character]</a></article>";
        }
        $this->viewGererPersonnage->setCharacterList($characterList);
        return $characterList;
    }


    public function render(){

        $characterList=$this->readCharacter();

        echo $this->getViewGererPersonnage()->setCharacterList($characterList)->displayView();
    }
}

$gererPersonnage=new ControllerGererPersonnage(new ModelGererPersonnage(),new ViewGererPersonnage);

$gererPersonnage->render();
    

include "./view/footer.php";
?> 