<?php
    class Guerrier{
        private ?int $heroisme;

        public function __construct(?string $nom, ?string $description,?int $pdv,?int $heroisme){
            $this->nom = $nom;
            $this->description = $description;
            $this->pdv = $pdv;
            $this->heroisme = $heroisme;
        }


        public function getHeroisme(): ?int{
            return $this->heroisme;
        }
        public function setHeroisme(?int $heroisme): Guerrier{
            $this->heroisme = $heroisme;
            return $this;
        }
    }
?>