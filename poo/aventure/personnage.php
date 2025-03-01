<?php
    //! class personnage

    class Personnage{
        //* attribut

        //? encapsulation, typage, variable
        private ?string $nom; //? le ? permet de rendre un attribut nullable
        private ?string $description;
        private ?int $pointDeVie; //? private ?int $poinsDeVie=10; pour mettre 10 par defaut
        private ?Arme $arme;

        //* constructeur
        //? méthode magique pour toute les classes
        public function __construct(?string $newNom, ?string $newDescription, ?int $newPointDeVie){ //? il y a un paramètre par defaut pour les points de vie (10)
            $this->nom = $newNom; 
            $this->description = $newDescription; 
            $this->pointDeVie = $newPointDeVie;
        }

        //* getter et setter
        //* getter : retourne la valeur d'un attribut
        //* setter : modifie la valeur d'un attribut
        public function getNom(): ?string{
            return $this->nom;
        }
        public function getDescription(): ?string{
            return $this->description;
        }
        public function getPointDeVie(): ?int{
            return $this->pointDeVie;
        }
        public function getArme(): ?Arme{
            return $this->arme;
        }
        public function setNom(?string $newNom): Personnage{
            $this->nom = $newNom;
            return $this;
        }
        public function setDescription(?string $newDescription): Personnage{
            $this->description = $newDescription;
            return $this;
        }
        public function setPointDeVie(?string $newPointDeVie): Personnage{
            $this->pointDeVie = $newPointDeVie;
            return $this;
        }
        public function setArme(?Arme $newArme): Personnage{
            $this->arme = $newArme;
            return $this;
        }

        //* method
        public function parler():string{
            return "Hello! je m'appelle ".$this->getNom();
        }
    }
?>