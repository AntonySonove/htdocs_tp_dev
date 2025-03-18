<?php
class ViewFichePersonnage {

    //! attributs
    private ?string $character;

    //! getter et setter
    public function getCharacter():?string{ return $this->character; }
    public function setCharacter($character): self { $this->character = $character; return $this; }

    //! method
    public function displayView():string{

        return'
<main id=mainFichePersonnage class="column alignCenter">
    '.$this->getCharacter().'      
</main>
        ';
    }
}
?>


