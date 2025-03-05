<?php
//IMPORT DES RESSOURCES

include './utils/utils.php';
include './View/viewHeader.php';
include './View/viewFooter.php';
include './View/viewCategory.php';
include './Model/modelCategory.php';
include './Controller/genericController.php';

class ControllerCategory extends GenericController{
    //ATTRIBUTS
    private ?ModelCategory $modelCategory;
    private ?ViewCategory $viewCategory;

    //CONSTRUCTEUR
    public function __construct(?ViewCategory $viewCategory, ?ModelCategory $modelCategory){
        $this->setHeader(new ViewHeader());
        $this->setFooter(new ViewFooter());
        $this->viewCategory = $viewCategory;
        $this->modelCategory = $modelCategory;
    }

    //GETTER ET SETTER
    public function getModelCategory(): ?ModelCategory { return $this->modelCategory; }
    public function setModelCategory(?ModelCategory $modelCategory): self { $this->modelCategory = $modelCategory; return $this; }

    public function getViewCategory(): ?ViewCategory { return $this->viewCategory; }
    public function setViewCategory(?ViewCategory $viewCategory): self { $this->viewCategory = $viewCategory; return $this; }

    //METHOD
    public function addCategory():string{
        //1) Vérifier qu'on reçoit le formulaire
        if(isset($_POST['submit'])){
            //2) Vérifier le champs vide
            if(empty($_POST['name'])){
                return "Veuillez donner un nom de catégorie.";
            }

            //3) Vérifier le format (pas à faire puisqu'on attend juste une string)

            //4) Nettoyer les données
            $name = sanitize($_POST['name']);

            //5) Vérifier si la categorie existe déjà en bdd
            //5.1) Donner le nom au Model
            $this->getModelCategory()->setName($name);

            //5.2) Je demande de chercher le nom en Bdd
            $data = $this->getModelCategory()->getByName();

            //5.3) Je vérifie si la réponse est vide ou non
            if(!empty($data)){
                return 'Cette catégorie existe déjà.';
            }

            //6) Ajouter la categorie
            $data = $this->getModelCategory()->add();

            //7) Retourner le message de confirmation
            return $data;
        }

        return '';
    }

    public function readCategories():string{
        //1) Récupérer la liste des catégories
        $data = $this->getModelCategory()->getAll();

        //2) Mettre ne forme les donnée grâce à une boucle
        $categoriesList = '';

        foreach($data as $category){
            $categoriesList = $categoriesList."<li>{$category['name']}</li>";
        }

        //3) retourne les données formatées
        return $categoriesList;
    }

    public function render():void{
        //TRAITEMENT DES DONNES
        $message = $this->addCategory();
        $categoriesList = $this->readCategories();

        //ON DONNE LES DONNEES A LA VIEW
        $this->getViewCategory()->setMessage($message)->setCategoriesList($categoriesList);

        //ON FAIT L'AFFICHAGE FINALE
        echo $this->getHeader()->displayView();
        echo $this->getViewCategory()->displayView();
        echo $this->getFooter()->displayView();
    }
}

$category = new ControllerCategory(new ViewCategory(), new ModelCategory());
$category->render();