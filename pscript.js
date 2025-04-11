function redirectTo(page) {
    window.location.href = page;
}

function login() {
    alert("Login realizado com sucesso!");
    redirectTo("home.html");
}

function cadastrar() {
    alert("Conta criada com sucesso!");
    redirectTo("tela7.html");
}

function recuperarSenha() {
    alert("Um email de recuperação foi enviado!");
    redirectTo("tela4.html");
}

document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".progress")) {
        setTimeout(() => {
            window.location.href = "home.html"; 
        }, 3000);
    }
});
