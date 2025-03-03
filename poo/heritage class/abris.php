<?php
    class Abris{
        private ?string $nom;

        
        public function __construct(?string $nom){
            $this->nom = $nom;
        }
        public function getNom(): ?string{
            return $this->nom;
        }
        public function setNom(?string $nom): Abris{
            $this->nom = $nom;
            return $this;
        }
        
        /**
         * abriter():afficher une phrase
         * @param : void
         * @return : void
        */
        public function abriter():void{
            echo"<p>Je m'abrite dans {$this->getNom()}.</p>";
        }
    }

    
?>
