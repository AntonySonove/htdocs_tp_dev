<?php
    class Vehicule{

        //! attributs
        private ?string $nom;
        private ?int $nbrRoue;
        private ?int $vitesse;

        //! constructor
        public function __construct(?string $newNom, ?int $newNbrRoue, ?int $newVitesse){
            $this->nom = $newNom;
            $this->nbrRoue = $newNbrRoue;
            $this->vitesse = $newVitesse;
        }
        //! getter et setter
        public function getNom(): ?string{
            return $this->nom;
        }
        public function getNbrRoue(): ?int{
            return $this->nbrRoue;
        }
        public function getVitesse(): ?int{
            return $this->vitesse;
        }

        public function setNom(?string $newNom): Vehicule{
            $this->nom = $newNom;
            return $this;
        }
        public function setNbrRoue(?int $newNbrRoue): Vehicule{
            $this->nbrRoue = $newNbrRoue;
            return $this;
        }
        public function setVitesse(?int $newVitesse): Vehicule{
            $this->newVitesse = $newVitesse;
            return $this;
        }

        //! method
        //* fonction detect
        public function detect():string{
            if($this->getNbrRoue()>2){
                return "<p>voiture</p>";
            }else{
                return "<p>moto</p>";
            }
        }

        //* fonction boost
        public function boost($vehicule):string{
            $vehicule->setVitesse($this->vitesse+=50);
            return "<p>La nouvelle vitesse de {$vehicule->getNom()} est {$vehicule->getVitesse()}km/h</p>";
        }

        //* fonction plusRapide()
        public function plusRapide($vehicule):string{
            if($this->vitesse>$vehicule->vitesse){
                return "<p>Le véhicule le plus rapide est {$this->getNom()}</p>";
            }else if ($this->vitesse==$vehicule->vitesse){
                return "<p>Les deux véhicules ont la même vitesse</p>";
            }else{
                return "<p>Le véhicule le plus rapide est {$vehicule->getNom()}</p>";
            }   
        }
    }
?>