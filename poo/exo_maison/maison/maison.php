<?php
        class Maison{

            //* attributs
            private ?string $nom;
            private ?int $longueur;
            private ?int $largeur;
            private ?int $nbrEtage;
    
            //* constructor
            public function __construct(?string $nom,?int $longueur,?int $largeur,?int $nbrEtage){
                $this -> nom = $nom;
                $this -> longueur = $longueur;
                $this -> largeur = $largeur;
                $this -> nbrEtage = $nbrEtage;
            }
    
            //*getter et setter
            public function getNom():?string{
                return $this -> nom;
            }
            public function setNom(?string $nom):?Maison{
                $this -> nom=$nom;
                return $this;
            }


            public function getLongueur():?int{
                return $this -> longueur;
            }
            public function setLongueur(?int $longueur):? Maison{
                $this -> longueur=$longueur;
                return $this;
            }

            public function getLargeur():?int{
                return $this -> largeur;
            }
            public function setLargeur(?int $largeur):?Maison{
                $this -> largeur=$largeur;
                return $this;
            }


            public function getNbrEtage():?int{
                return $this -> nbrEtage;
            }
            public function setNbrEtage(?int $nbrEtage):?Maison{
                $this -> nbrEtage=$nbrEtage;
                return $this;
            }
    
            //* method
            public function surface():?int{
                return $this->getlongueur()*$this->getLargeur()*($this->getNbrEtage()+1);
            }
        }
?>