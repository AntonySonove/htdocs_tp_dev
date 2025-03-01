<?php
      class Maison{
        //* attributs
        private ?string $nom;
        private ?int $longueur;
        private ?int $largeur;
        private ?int $nbrEtage;
        
        //* constructeur
        public function __construct(?string $newNom, ?int $newLongueur, ?int $newLargeur, ?int $newNbrEtage){
            $this->nom = $newNom;
            $this->longueur = $newLongueur;
            $this->largeur = $newLargeur;
            $this->nbrEtage = $newNbrEtage;
        }

        //* getter et setter
        public function getNom(): ?string{
            return $this->nom;
        }
        public function getLongueur(): ?int{
            return $this->longueur;
        }
        public function getlargeur(): ?int{
            return $this->largeur;
        }
        public function getNbrEtage(): ?int{
            return $this->nbrEtage;
        }

        public function setNom(?string $newNom): Maison{
            $this->nom = $newNom;
            return $this;
        }
        public function setLongueur(?int $newLongueur): Maison{
            $this->longueur = $newLongueur;
            return $this;
        }
        public function setLargeur(?int $newlargeur): Maison{
            $this->largeur = $newlargeur;
            return $this;
        }
        public function setNbrEtage(?int $newnbrEtage): Maison{
            $this->nbrEtage = $newnbrEtage;
            return $this;
        }

        //* method
        public function surface():int{
            return $this->getLongueur()*$this->getLargeur()*($this->getNbrEtage()+1);
        }
    }
?>