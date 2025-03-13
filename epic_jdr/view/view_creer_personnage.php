<?php
class ViewCreerPersonnage{
    private ?string $message="";

    public function getMessage(): ?string{
        return $this->message;
    }
    public function setMessage(?string $message): ViewCreerPersonnage{
        $this->message = $message;
        return $this;
    }
    

    public function displayView(){
        return '<main>
    <h2>Créer un nouveau personnage</h2>
    <form action="" method="post">
        <p><input type="text" name="name" placeholder="Nom"></p>
        <p><input type="number" name="lp" placeholder="Points de vie"></p>
        <p><input type="number" name="mp" placeholder="Points de magie"></p>
        <p><input type="number" name="atk" placeholder="Attaque"></p>
        <p><input type="number" name="def" placeholder="Defense"></p>
        <p><input type="number" name="atkm" placeholder="Attaque magique"></p>
        <p><input type="number" name="defm" placeholder="Défende magique"></p>
        <p><input type="number" name="speed" placeholder="Vitesse"></p>
        <p><input type="submit" name="submit" value="Créer"></p>
        <p>'.$this->getMessage().'</p>
    </form>
</main>';
    }
}
?>

