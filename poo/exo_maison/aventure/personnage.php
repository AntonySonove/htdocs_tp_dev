<?php
    class Personnage{
        private ?string $nom;
        private ?string $description;
        private ?int $pdv;
        private Arme $arme;


        public function __construct(?string $nom,?string $description,?int $pdv){
            $this->nom = $nom;
            $this->description = $description;
            $this->pdv = $pdv;
        }


        public function getNom(): ?string{
            return $this->nom;
        }
        public function getDescription(): ?string{
            return $this->description;
        }
        public function getPdv(): ?string{
            return $this->pdv;
        }
        public function getArme():Arme{
            return $this->arme;
        }


        
        public function setNom(?string $nom): Personnage{
            $this->nom = $nom;
            return $this;
        }
        public function setDescription(?string $description): Personnage{
            $this->description = $description;
            return $this;
        }
        public function setPdv(?string $pdv): Personnage{
            $this->pdv = $pdv;
            return $this;
        }
        public function setArme(?Arme $arme): Personnage{
            $this->arme = $arme;
            return $this;
        }

    }
?>