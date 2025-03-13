<?php
    class Arme{

        //! attributs
        private ?string $nom;
        private ?int $degat;

        
        //! constructor
        public function __construct(?string $nom, ?int $degat){
            $this->nom = $nom;
            $this->degat = $degat;
        }


        //! getter et setter
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


        //! method
        public function attaquer($personnage):?int{
            $degatArme=rand(1,$this->degat);
            echo "{$personnage->getNom()} attaque avec son {$this->getNom()} et inflige {$degatArme} points de dégats";
            return $degatArme;
        }
    }
?>