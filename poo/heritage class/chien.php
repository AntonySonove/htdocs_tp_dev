<?php
    class Chien extends Animal{
        private ?string $poil;
        private ?int $nbrPatte;

        //* constructor
        public function __construct(?string $nom,string $couleur,float $taille, int $age, string $poil, int $nbrPatte){
            $this->setNom($nom);
            $this->setCouleur($couleur);
            $this->setTaille($taille);
            $this->setAge($age);
            $this->poil=$poil;
            $this->nbrPatte=$nbrPatte;
        }
        //* getter et setter
        public function getPoil(): ?int {
            return $this->poil;
        }
        public function setPoil(?int $poil): Chien {
            $this->poil = $poil;
            return $this;
        }
        public function getNbrPatte(): ?int {
            return $this->nbrPatte;
        }
        public function setNbrPatte(?int $nbrPatte): Chien {
            $this->nbrPatte = $nbrPatte;
            return $this;
        }

        //* method
        public function accoucher():void{
            echo "<p>Je met bâs</p>";
        }
        
        /**
         * seMultiplier(): appel la method accoucher() redéfinie dans la classe chien
         * @param $partenaire de type Animal
         * @return void
         */
        public function seMultiplier(Animal $partenaire):void{
            $this->accoucher();
        }
        public function mettreAuMonde():void{
            parent::seMultiplier($this);
        }
    }
?>