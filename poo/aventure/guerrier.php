<?php
    class Guerrier extends Personnage{
        private ?int $heroisme;

        public function __construct(?string $newNom,?string $newDescription,?int $newPointDeVie,?int $newHeroisme){
            
        $this->setNom($newNom); 
        $this->setDescription($newDescription); 
        $this->setPointDeVie($newPointDeVie); 
        $this->heroisme = $newHeroisme;
        }

        public function getHeroisme(): ?int{
            return $this->heroisme;
        }

        public function setHeroisme(?int $newHeroisme): Guerrier{
            $this->heroisme = $newHeroisme;
            return $this;
        }

        public function defoncerDesMurs(): void{
            if($this->getHeroisme()>0){
                echo "<p>{$this->getNom()} passe à travers le mur comme dans du beurre!</p>";
                $this->setHeroisme($this->heroisme-=1);
            }else{
                echo "<p>{$this->getNom()} est repoussé par le mur. Quel disgrâce!</p>";
                
            }
        }

        public function discuter(Personnage $partenaire){
            echo "<p>{$this->getNom()} à {$partenaire->getNom()} : Ca va?</p>";
        }
    }
?>