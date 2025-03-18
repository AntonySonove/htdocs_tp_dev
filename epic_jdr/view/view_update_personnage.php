<?php
class ViewUpdatePersonnage{
    private ?string $message="";
    private ?string $name="";

    public function getMessage(): ?string{
        return $this->message;
    }
    public function setMessage(?string $message): ViewUpdatePersonnage{
        $this->message = $message;
        return $this;
    }

    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): self { $this->name = $name; return $this; }

    public function displayView(): ?string{
        return '
        
        <main id="mainCreerPersonnage" class="column alignCenter">
    <h2>Modifier un personnage</h2>
    <form id="formCreerPersonnage" class="divJaune column gap5" action="" method="post">
        <p class="row spaceBetween">Points de vie<input type="number" name="lp" placeholder="Points de vie"></p>
        <p class="row spaceBetween">Points de magie<input type="number" name="mp" placeholder="Points de magie"></p>
        <p class="row spaceBetween">Attaque<input type="number" name="atk" placeholder="Attaque"></p>
        <p class="row spaceBetween">Défense<input type="number" name="def" placeholder="Defense"></p>
        <p class="row spaceBetween">Attaque magique<input type="number" name="atkm" placeholder="Attaque magique"></p>
        <p class="row spaceBetween">Défense magique<input type="number" name="defm" placeholder="Défende magique"></p>
        <p class="row spaceBetween">Vitesse<input type="number" name="speed" placeholder="Vitesse"></p>
        <div class="row justifyCenter">
        <p><input class="boutonJaune" type="submit" name="submit" value="Valider"></p>
        </div>
        <p>'.$this->getMessage().'</p>
    </form>
</main>
        
        ';
    }


}
        // <p class="row spaceBetween">Nom<input type="text" name="name" placeholder="Nom"></p>



?>

