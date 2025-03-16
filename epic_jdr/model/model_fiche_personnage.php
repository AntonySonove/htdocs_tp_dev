<?php
class ModelFichePersonnage extends ModelGererPersonnage{
    private ?PDO $bdd;

    public function __construct() {
        $this->bdd = dbConnect();
    }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): self { $this->bdd = $bdd; return $this; }

    public function displayCharacter():array | string{

        $req=$this->getBdd()->prepare("SELECT name_character, lp, mp, atk, def, atkm, defm, speed, id_user FROM characters WHERE id_character=?");



        return"";
    }
}

?>