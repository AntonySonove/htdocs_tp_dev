<?php
class ViewGererPersonnage{

    //! attributs
    private ?string $characterList="";

    //! getter et setter
    public function getCharacterList(): ?string { return $this->characterList; }
    public function setCharacterList(?string $characterList): self { $this->characterList = $characterList; return $this; }

    //! method
    public function displayView(): array | string{

        return '
<main>
    <div class= gridGerer>
        '.$this->getCharacterList().'
    </div>
</main>
        ';
    } 
}


?>

