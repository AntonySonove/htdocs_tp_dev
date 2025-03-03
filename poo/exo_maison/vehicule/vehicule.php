<?php
    class Vehicule{
        private ?string $nom;
        private ?int $vitesse;
        private ?int $roue;

        public function __construct(?string $nom,?int $vitesse,?int $roue){
            $this->nom=$nom;
            $this->vitesse=$vitesse;
            $this->roue=$roue;
        }

        public function getNom(): ?string{
            return $this->nom;
        }
        public function getVitesse(): ?int{
            return $this->vitesse;
        }
        public function getRoue(): ?int{
            return $this->roue;
        }


        public function setNom(?string $nom): Vehicule{
            $this->nom=$nom;
            return $this;
        }
        public function setVitesse(?int $vitesse): Vehicule{
            $this->vitesse=$vitesse;
            return $this;
        }
        public function setRoue(?int $roue): Vehicule{
            $this->roue=$roue;
            return $this;
        }


        public function detect():?string{
            if($this->getRoue()>2){   
                echo "<p>{$this->getNom()} est une voiture</p>";
                return "";
            }else{         
                echo "<p>{$this->getNom()} est une moto</p>";
                return "";
            }
        }


        public function boost():?int{
            $this->setVitesse($this->vitesse+=50);
            echo"<p>La vitesse de {$this->getNom()} est maintenant de {$this->getVitesse()}";
            return $this->getVitesse();
        }


        public function plusRapide($vehicule):?string{
            if($this->getVitesse()>$vehicule->getVitesse()){
                echo "<p>le véhicule le plus rapide est {$this->getNom()}</p>";
                return "";
            }else if ($this->getVitesse()==$vehicule->getVitesse()){
                echo "<p> les véhicules ont la même vitesse</p>";
                return "";
            }else{
                echo "<p>le véhicule le plus rapide est {$vehicule->getNom()}</p>";
                return "";
            }
        }
    }
    
?>