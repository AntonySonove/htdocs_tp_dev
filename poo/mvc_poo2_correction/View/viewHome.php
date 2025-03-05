<?php
class ViewHome{
    private ?string $message = "";
    private ?string $usersList = "";
    private ?string $messageConnexion = "";

    //GETTER ET SETTER
    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $message): self { $this->message = $message; return $this; }

    public function getUsersList(): ?string { return $this->usersList; }
    public function setUsersList(?string $usersList): self { $this->usersList = $usersList; return $this; }

    public function getMessageConnexion(): ?string { return $this->messageConnexion; }
    public function setMessageConnexion(?string $messageConnexion): self { $this->messageConnexion = $messageConnexion; return $this; }

    //METHOD
    public function displayView():string{
        return '
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
                    <h1>Connexion</h1>
                    <form action="" method="POST">
                        <input type="text" name="emailConnexion" placeholder="Votre Email" />
                        <input type="text" name="passwordConnexion" placeholder="Votre Mot de Passe" />
                        <input type="submit" name="submitConnexion"/>
                    </form>
                    <p>'.$this->getMessageConnexion().'</p>
                </section>
                <section>
                    <h1>Liste des Utilisateurs</h1>
                    <ul>'.$this->getUsersList().'</ul>
                </section>
            </main>';
    }
}