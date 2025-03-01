<?php
    class Voleur extends Personnage{

        public function __construct(?string $newNom,?string $newDescription,?int $newPointDeVie){
            
        $this->setNom($newNom); 
        $this->setDescription($newDescription); 
        $this->setPointDeVie($newPointDeVie); 
        }

        public function devenirInvisible():void{
            echo "<p>{$this->getNom()} devient une ombre.</p>";
        }

        public function discuter(Personnage $partenaire){
            echo "<p>{$this->getNom()} à {$partenaire->getNom()} : Salut!</p>";
        }
    }
?>