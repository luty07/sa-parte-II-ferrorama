function redirectTo(page) {
    window.location.href = page;
}

function login() {
    alert("Login realizado com sucesso!");
    redirectTo("pinicio.html");
}

function cadastrar() {
    alert("Conta criada com sucesso!");
    redirectTo("ptela7.html");
}

function recuperarSenha() {
    alert("Um email de recuperação foi enviado!");
    redirectTo("ptela4.html");
}

document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector(".progress")) {
        setTimeout(() => {
            window.location.href = "pinicio.html"; 
        }, 3000);
    }
});
 function welcome (){
    redirectTo ("ptela6.html")
 }
 function irparaPag(pagina) {
    window.location.href = pagina;
  }
  