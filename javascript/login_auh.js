// script.js
const username = document.getElementById("username");
const alertMessageUsername = createAlertMessage("Username is too short");
const password = document.getElementById("password");
const alertMessagePassword = createAlertMessage("Password is too short!");

function createAlertMessage(text) {
    const alertMessage = document.createElement("div");
    alertMessage.innerHTML = text;
    alertMessage.classList.add("alert-message");
    return alertMessage;
}

function validateInput(input, alertMessage, size) {
    if (input.value.length < size) {
        alertMessage.style.display = "block";
        input.insertAdjacentElement("afterend", alertMessage);
    } else {
        alertMessage.style.display = "none";
    }
}

function validatePassword() {
    validateInput(password, alertMessagePassword, 8);
}

function validateUsername() {
    validateInput(username, alertMessageUsername, 3);
}

username.addEventListener("input", validateUsername);
password.addEventListener("input", validatePassword);

const loginButton = document.getElementById("login_button");

loginButton.addEventListener("click", function tempLogin() {
    if (username.value.length >= 4 && password.value.length >= 8) {
        Swal.fire({
            title: "Welcome Back !",
            text: "You are logged in as " + username.value,
            icon: "success",
        });
    } else {
        Swal.fire({
            title: "Error !",
            text: "Please fill the fields",
            icon: "error",
        });
    }
});
