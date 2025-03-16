<?php
class ViewIndex{

    //! attributs
   private ?string $message="";
   private ?string $messageConnexion= "";
   
   //! getter et setter
   public function getMessage(): ?string { return $this->message; }
   public function setMessage(?string $message): self { $this->message = $message; return $this; }
   public function getMessageConnexion(): ?string { return $this->messageConnexion; }
   public function setMessageConnexion(?string $messageConnexion): self { $this->messageConnexion = $messageConnexion; return $this; }
    
    //! method
    public function displayView(){
    
        return '
    <main id="mainIndex">
    <div class="divJaune">
        <h1>Bienvenue sur EPIC JDR</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eos omnis quaerat odit quam doloribus hic rem? Neque, nam tenetur doloremque nulla nostrum adipisci itaque. Commodi, esse temporibus tempora doloribus ipsam odit, molestiae unde nam officiis ut debitis doloremque iure porro fugiat quod corporis cupiditate itaque. Voluptate porro deserunt fuga explicabo iste consequatur minus soluta necessitatibus ab magni, nulla beatae. Maiores illum unde excepturi blanditiis ut iusto, dolore iste libero at ea ratione pariatur dolorem ducimus velit est atque non magni nihil laboriosam, aliquid autem? Tenetur reprehenderit dolorem at, odit libero dignissimos eaque aperiam quibusdam a sunt tempora! Natus, repellendus.</p>
    </div>
    <div id="connexionInscription">
        <form id="connexion" class="divJaune column" method="post">
            <h2>Connexion</h2>
            <div class="row spaceBetween">
                <div id="gapInput" class="column spaceBetween">
                    <div class="column">
                        <input type="email" name="emailConnexion" placeholder="E-mail">
                    </div>
                    <div class="column">
                        <input type="password" name="passwordConnexion" placeholder="Mot de passe">
                        '.$this->getMessageConnexion().'
                    </div>
                </div>
                <input class="boutonJaune boutonConnexionInscription scale" type="submit" name="submitConnexion" class="bouton commencerLAventure" value="Continuer l\'aventure!"></input>
            </div>
        </form>
        <form id="inscription" class="divJaune column" method="post">
            <h2>Inscription</h2>
            <div class="row spaceBetween">
                <div id="inputInscription" class="column">
                    <input type="text" name="nickname" placeholder="Pseudo">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input type="password" name="password2" placeholder="Confirmer le mot de passe">
                    '.$this->getMessage().'
                </div>
                <input class="boutonJaune boutonConnexionInscription scale" type="submit" name="submit" class="bouton commencerLAventure" value="Commencer l\'aventure!"></input>
            </div> 
        </form>
    </div>
</main>
        ';
    
    }

  
}
?>