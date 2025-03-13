<?php
    class Voleur extends Personnage{


        //! constructor
        public function __construct(?string $nom, ?string $description,?int $pdv){
            $this->setNom($nom);
            $this->setDescription($description);
            $this->setPdv($pdv);
        }

        
        //! method
        public function devenirInvisible():string{
            echo "<p>{$this->getNom()} devient une ombre.</p>";
            return "";
        }
    }
?>