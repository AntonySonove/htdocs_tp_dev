<?php
    class Arme{
        private ?string $nom;
        private ?int $degat;

        
        public function __construct(?string $nom, ?int $degat){
            $this->nom = $nom;
            $this->degat = $degat;
        }


        public function getNom(): ?string{
            return $this->nom;
        }
        public function setNom(?string $nom): Arme{
            $this->nom = $nom;
            return $this;
        }


        
        public function getdegat(): ?int{
            return $this->degat;
        }
        public function setdegat(?int $degat): Arme{
            $this->degat = $degat;
            return $this;
        }
    }
?>