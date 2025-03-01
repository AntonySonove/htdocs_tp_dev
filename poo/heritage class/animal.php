<?php
    class Animal {
        //* attributs :
        private ?string $nom;
        private ?string $couleur;
        private ?float $taille;
        private ?int $age;
        private ?Abris $abris;

        //* constructeur :
        public function __construct(?string $nom,string $couleur,float $taille, int $age){
            $this->nom = $nom;
            $this->couleur = $couleur;
            $this->taille = $taille;
            $this->age = $age;
        }

        //* getter et setter
        public function getNom(): ?string {
            return $this->nom;
        }
        public function getCouleur(): ?string {
            return $this->couleur;
        }
        public function getTaille(): ?int {
            return $this->taille;
        }
        public function getAge(): ?int {
        }
        public function getAbris():?Abris{
            return $this->abris;
        }

        public function setNom(?string $newNom): Animal {
            $this->nom = $newNom;
            return $this;
        }
        public function setCouleur(?string $newCouleur): Animal {
            $this->couleur = $newCouleur;
            return $this;
        }
        public function setTaille(?int $newTaille): Animal {
            $this->taille = $newTaille;
            return $this;
        }
        public function setAge(?int $newAge): Animal {
            $this->age = $newAge;
            return $this;
        }
        public function setAbris(?Abris $NewAbris): Animal {
            $this->abris = $NewAbris;
            return $this;
        }
        
        //* method : 
        public function seNourrir(?string $aliment): string | array{
            if($aliment=="poison"){
                return "Manges pas!";
            }else{
                return [$aliment,"C'est bon!", $this->nom." à aimé son repas!"];
            }
        }
        public function seMultiplier(Animal $partenaire):void{
            echo"Je me multiplie grâce à {$partenaire->getNom()}";
        }
    }

    // $chien = new Animal("chien","noir",1.10,5);

    // echo"j'ai un ". $chien->nom.". Il est de couleur ".$chien->couleur.". Il a ".$chien->age." ans"; 

    // $reponse= $chien->seNourrir("viande");
    // if(getType($reponse)=="string"){
    //     echo"<p>".$reponse."</p>";
    // }else{
    //     echo "<p>".$reponse[2]."</p>";
    // }
?>

