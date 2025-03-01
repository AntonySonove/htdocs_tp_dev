<?php
    class Arme{
        private ?string $nom;
        private ?int $degat;

        public function __construct($newNom,$newDegat){
            $this->nom=$newNom;
            $this->degat=$newDegat;
        }

        public function getNom():?string{
            return $this->nom;
        }
        public function getdegat():int{
            return $this->degat;
        }

        public function setNom(?string $newNom):Arme{
            $this->nom = $newNom;
            return $this;
        }
        public function setDegat(?int $newDegat):Arme {
            $this->degat = $newDegat;
            return $this;
        }
        public function attaquer($personnage):void{
            $grosDegat=rand(1,$this->degat);
            echo"<p>{$personnage->getNom()} attaque avec {$this->getNom()} pour {$grosDegat}!</p>";
            
        }

    }

?>