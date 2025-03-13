<!-- VUE DE LA PAGE D'ACCUEIL -->

<?php
class ViewPlayer{
    private ?string $message="";
    private ?string $userList="";


    public function getMessage(): ?string{
        return $this->message;
    }
    public function getUserList(): ?string{
        return $this->userList;
    }


    public function setMessage(string $message): ViewPlayer{
        $this->message=$message;
        return $this;
    }
    public function setUserList(string $userList): ViewPlayer{
        $this->userList=$userList;
        return $this;
    }





    public function displayView():?string{
        return "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Supergame</title>
        </head>
        <body>
            <header></header>
            <h1>Accueil</h1>
            <form action='' method='post'>
                <h2>Inscription d'un Joueur</h2>
                <input type='text' name='nickname'placeholder='Votre Pseudo'>
                <input type='email' name='email' placeholder='Votre Email'>
                <input type='password' name='password' placeholder='Votre Mot de Passe'>
                <input type='text' name='score' placeholder='Votre Score'>
                <input type='submit' name='submit' value='Envoyer'>
            </form>
            <p>".$this->getMessage()."</p>
            <ul>".$this->getUserList()."</ul>
            <footer></footer>
        </body>
        </html>";
    }
}
?>












<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supergame</title>
</head>
<body>
    <header></header>
    <h1>Accueil</h1>
    <form action=""method="post">
        <h2>Inscription d'un Joueur</h2>
        <input type="text" name="nickname" placeholder="Votre Pseudo">
        <input type="email" name="email" placeholder="Votre Email">
        <input type="password" name="password" placeholder="Votre Mot de Passe">
        <input type="text" name="score" placeholder="Votre Score">
        <input type="submit" name="submit" value="Envoyer">
    </form>
    <?= $message ?>
    <?= $userList ?>
    <footer></footer>
</body>
</html> -->