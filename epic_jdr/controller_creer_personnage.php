<?php
session_start();
include "./utils/functions.php";
include "./model/model_creer_personnage.php";
include "./controller_header.php";
include "./view/view_creer_personnage.php";


class ControllerCreerPersonnage{
    private ?ModelCreerPersonnage $modelCreerPersonnage;
    private ?ViewCreerPersonnage $viewCreerPersonnage;

    public function __construct(ModelCreerPersonnage $modelCreerPersonnage, ViewCreerPersonnage $viewCreerPersonnage){
        $this->modelCreerPersonnage = $modelCreerPersonnage;
        $this->viewCreerPersonnage = $viewCreerPersonnage;
    }

    public function getModelCreerPersonnage():ModelCreerPersonnage{
        return $this->modelCreerPersonnage;
}
    public function getViewCreerPersonnage():ViewCreerPersonnage{
        return $this->viewCreerPersonnage;
}
    public function setModelCreerPersonnage(?ModelCreerPersonnage $modelCreerPersonnage):self {
        $this->modelCreerPersonnage = $modelCreerPersonnage;
        return $this;
    }
    public function setViewCreerPersonnage(ViewCreerPersonnage $viewCreerPersonnage):?self{
        $this->viewCreerPersonnage = $viewCreerPersonnage;
        return $this;
    }


    public function signUpCharacter():string | int{

        //*vérifier qu'on reçoit le formulaire
        if(isset($_POST["submit"])){

            //* vérifier si les chams sont vides
            if(empty($_POST["name"]) || empty($_POST["lp"]) || empty($_POST["mp"]) || empty($_POST["atk"]) || empty($_POST["def"]) || empty($_POST["atkm"]) || empty($_POST["defm"]) || empty($_POST["speed"])){

                return "<span style='color: red'>*Un ou plusieurs champs sont vides</span>";

            }else{
                //* nettoyage des données
                $name=sanitize($_POST["name"]);
                $lp=sanitize($_POST["lp"]);
                $mp=sanitize($_POST["mp"]);
                $atk=sanitize($_POST["atk"]);
                $def=sanitize($_POST["def"]);
                $atkm=sanitize($_POST["atkm"]);
                $defm=sanitize($_POST["defm"]);
                $speed=sanitize($_POST["speed"]);   
            }

            //* vérifier que le nom du personnage est disponible en bdd
            $this->getModelCreerPersonnage()->setName($name);
            $data=$this->getModelCreerPersonnage()->getByName();

            if(!empty($data)){
            
                return "<span style='color: red'>*Ce nom n'est pas disponible</span>";
            }

            //* donner les informations au model
            $this->getModelCreerPersonnage()->setName($name)->setLp($lp)->setMp($mp)->setAtk($atk)->setDef($def)->setAtkm($atkm)->setDefm($defm)->setSpeed($speed)->setId($_SESSION["id_user"]);
            
            //* demander au model d'utiliser sa fonction add
            return $this->getModelCreerPersonnage()->addCharacter();
        }

        return "";
    }

    public function render():void{

        //* charger les messages de la fonction signUpCharacter
        $message=$this->signUpCharacter();

        echo $this->getViewCreerPersonnage()->setMessage($message)->displayView();
    }
}

$creerPersonnage=new ControllerCreerPersonnage(new ModelCreerPersonnage(), new ViewCreerPersonnage());
$creerPersonnage->render();


include "./view/footer.php";
?>