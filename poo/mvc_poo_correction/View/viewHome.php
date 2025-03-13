<?php
class ViewHome{
    private ?string $message = "";
    private ?string $usersList = "";

    //GETTER ET SETTER
    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getUsersList(): ?string { return $this->usersList; }
    public function setUsersList(?string $usersList): self { $this->usersList = $usersList; return $this; }

    //METHOD
    public function displayView():string{
        return '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <header></header>
            <main>
                <section>
                    <h1>Inscription</h1>
                    <form action="" method="POST">
                        <input type="text" name="nickname" placeholder="Votre Pseudo" />
                        <input type="text" name="email" placeholder="Votre Email" />
                        <input type="text" name="password" placeholder="Votre Mot de Passe" />
                        <input type="submit" name="submit"/>
                    </form>
                    <p>'.$this->getMessage().'</p>
                </section>
                <section>
                    <h1>Liste des Utilisateurs</h1>
                    <ul>'.$this->getUsersList().'</ul>
                </section>
            </main>
            <footer></footer>
        </body>
        </html>';
    }
}