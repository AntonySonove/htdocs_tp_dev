<!DOCTYPE html>
<html lang="fr">

<?php
    class ViewHome{
        //! attributs
        private ?string $message;
        private ?string $userList;


        //!method
        public function displayView(): ?string{
            // echo "<from><p>$message</p><ul>$userList</ul></form>";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action=""method="post">
            <input type="text" name="nickname" placeholder="Pseudo">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" name="submit" value="Inscription">
        </form>
        <p><?= $message ?></p>
    </section>
    <section>
        <ul><?= $userList ?></ul>
    </section>

</body>
</html>