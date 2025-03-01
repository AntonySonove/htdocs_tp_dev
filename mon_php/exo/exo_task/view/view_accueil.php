
<main>
    <div class="row">
        <form class="column gap15" action="" method="post">
        <h2>Inscription</h2>
            <p><input type="text" name="name" placeholder="Nom"></p>
            <p><input type="text" name="firstName" placeholder="Prénom"></p>
            <p><input type="email" name="email" placeholder="E-mail"></p>
            <p><input type="password" name="password" placeholder="Mot de passe"></p>
            <p><input type="password" name="password2" placeholder="Confirmer le mot de passe"></p>
            <p><input type="submit" name="submit" value="Inscription"></p>
        </form>
        <?= $message ?>
        <div class="column gap15">
        <h3>Liste des utilisateurs</h3>
        <?= $userList; ?>
        </div>
    </div>   
</main>