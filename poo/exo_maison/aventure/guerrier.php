<?php
    class Guerrier extends Personnage{

        //! attributs
        private ?int $heroisme;


        //! constructor
        public function __construct(?string $nom, ?string $description,?int $pdv,?int $heroisme){
            $this->setNom($nom);
            $this->setDescription ($description);
            $this->setPdv ($pdv);
            $this->heroisme = $heroisme;
        }


        //! getter et setter
        public function getHeroisme(): ?int{
            return $this->heroisme;
        }
        public function setHeroisme(?int $heroisme): Guerrier{
            $this->heroisme = $heroisme;
            return $this;
        }


        //! method
        public function defoncerDesMurs():void{
            if($this->heroisme>0){
                echo "<p>{$this->getNom()} passe à travers le mur comme dans du beurre!</p>";
                $this->heroisme-=1;
            }else{
                echo "<p>{$this->getNom()} est repoussé par le mur, quel disgrâce!";
            }
        }
    }
?>