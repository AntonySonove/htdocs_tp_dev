<?php
class ViewCategory {
    //ATTRIBUTS
    private ?string $message = '';
    private ?string $categoriesList = '';

    //GETTER ET SETTER
    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getCategoriesList(): ?string { return $this->categoriesList; }
    public function setCategoriesList(?string $categoriesList): self { $this->categoriesList = $categoriesList; return $this; }

    //METHOD
    public function displayView(){
        return'
            <main>
                <h1>Ajouter une Catégorie</h1>  
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="Votre Categorie" />
                    <input type="submit" name="submit" />
                </form>
                <p>'.$this->getMessage().'</p>

                <h1>Liste des Catégories</h1>
                <ul>'.$this->getCategoriesList().'</ul>
            </main>
        ';
    }
}