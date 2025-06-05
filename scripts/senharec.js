document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formulario");

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        let valido = true;

        // para limpar os erros
        document.getElementById("erroEmail").textContent = "";



        const email = document.getElementById("email").value.trim();



        console.log(email);

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            document.getElementById("erroEmail").textContent = "E-mail Inválido.";
            valido = false;
        }

        if (valido) {
            formulario.reset();
            window.location.href = "codemail.html";
        }


    });
});