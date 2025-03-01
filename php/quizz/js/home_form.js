const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/;
const passwordRegex = /^.{8,}$/;
const nameRegex = /^[a-zA-ZÀ-ÿ '-]+$/;


const formTitle = document.querySelector("section + h2");

const signupForm = document.querySelector('#signup-form');
const loginForm = document.getElementById('login-form');
const signupButton = document.querySelector('button[name="signup-submit"]');

const switchButton = document.getElementById("switch");
const switchText = document.getElementById('switch-text');

switchButton.addEventListener("click", toggleForms);

let form_is_login = true;

function toggleForms() {

    if (!form_is_login) {
        loginForm.classList.toggle("hidden");
        signupForm.classList.toggle("hidden");
        formTitle.innerText = "Connexion";
        switchText.textContent = "Vous avez déjà un compte ?";
        switchButton.innerText = "toggle_off";
    } else {
        loginForm.classList.toggle("hidden");
        signupForm.classList.toggle("hidden");
        formTitle.innerText = "Inscription";
        switchText.textContent = "Vous n'avez pas de compte ?";
        switchButton.innerText = "toggle_on";
    }
    form_is_login = !form_is_login;
}

signupButton.addEventListener('click', (event) => {
    event.preventDefault();
    const errors = validateForm();
    if (errors) {
        const errorList = document.createElement('ul');
        errors.forEach((error) => {
            const errorListItem = document.createElement('li');
            errorListItem.textContent = error;
            errorList.appendChild(errorListItem);
        });
        errorMessage.textContent = '';
        errorMessage.appendChild(errorList);
        errorMessage.classList.add('show');
    } else {
        signupForm.submit();
    }
});

function validateForm() {
    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;
    const passwordConfirm = document.getElementById('confirm-password').value;

    const errors = [];
    if (!nameRegex.test(firstName)) errors.push('Le prénom est invalide.');
    if (!nameRegex.test(lastName)) errors.push('Le nom est invalide.');
    if (!emailRegex.test(email)) errors.push('L\'adresse email est invalide.');
    if (!passwordRegex.test(password)) errors.push('Le mot de passe doit contenir au moins 8 caractères.');
    if (passwordConfirm.value != password.value) {
        errors.push("Les mots de passe ne correspondent pas");
    }

    return errors ? errors : null;
}