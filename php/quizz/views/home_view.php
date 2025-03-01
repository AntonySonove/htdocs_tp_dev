    <main>
        <section class="banner">
            <h1>BIENVENUE SUR ADRAR QUIZZ</h1>
        </section>
        <h2>Connexion</h2>
        <section class="base-box">
            <section class="switch-container">
                <span id="switch" class="material-symbols-outlined">toggle_off</span>
                <span id="switch-text">Vous n'avez pas de compte ?</span>
            </section>
            <form id="login-form">
                <label for="email">Adresse e-mail</label>
                <input id="email" class="inset-shadow" name="email" type="email" required autofocus/>
                <label for="password">Mot de passe</label>
                <input id="password" class="inset-shadow" name="password" type="password" required/>
                <section class="form-button">
                    <button type="submit" name="login-submit">Connexion</button>
                </section>
            </form>

            <form id="signup-form" class="hidden">
                <label for="first-name">Prénom</label>
                <input id="first-name" class="inset-shadow" name="first-name" type="text" required/>
                <label for="last-name">Nom</label>
                <input id="last-name" class="inset-shadow" name="last-name" type="text" required/>
                <label for="signup-email">Adresse e-mail</label>
                <input id="signup-email" class="inset-shadow" name="signup-email" type="email" required/>
                <label for="signup-password">Mot de passe</label>
                <input id="signup-password" class="inset-shadow" name="signup-password" type="password" required/>
                <label for="confirm-password">Confirmer mot de passe</label>
                <input id="confirm-password" class="inset-shadow" name="confirm-password" type="password" required/>
                <section class="form-button">
                    <section class="error-message"></section>
                    <button type="submit" name="signup-submit">Inscription</button>
                </section>
            </form>
        </section>
    </main>
    <script src="./js/home_form.js"></script>