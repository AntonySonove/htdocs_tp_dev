<?php
class ViewFichePersonnage {
    private ?string $character;

    public function getCharacter(){ return $this->character; }
    public function setCharacter($character): self { $this->character = $character; return $this; }


    public function displayView():string{
        return'
        
        ';
    }
}
?>