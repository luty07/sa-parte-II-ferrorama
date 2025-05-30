document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formulario");

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        let valido = true;

        // para limpar os erros
        document.getElementById("erroEmail").textContent = "";
        document.getElementById("erroSenha").textContent = "";


        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();


        console.log(email);
        console.log(senha);


        if (senha.length < 6) {
            document.getElementById("erroSenha").textContent = "O senha deve ter pelo menos 6 caracteres";
            valido = false;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            document.getElementById("erroEmail").textContent = "E-mail Inválido.";
            valido = false;
        }

        if (valido) {
            alert("Formulário enviado com sucesso!");
            formulario.reset();
            window.location.href = "public/inicio.html";
        }


    });
});