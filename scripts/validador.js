function validarFormulario() {
    const nome = document.getElementById('usuario').value.trim();
    const cpf = document.getElementById("cpf").value.trim();
    const idade = parseInt(document.getElementById('idade').value, 10);
    const experiencia = parseInt(document.getElementById('experiencia').value, 10);

    console.log(usuario);
    console.log(cpf);
    console.log(idade);
    console.log(experiencia);

    if (!usuario) {
        alert('por favor, preencha o seu email');
        return;
    }
    if (!cpf || cpf.length == 0 || isNaN(cpf)) {
        alert('por favor, insira um CPF valido');
        return
    }
    if (!idade || idade < 18 || isNaN(idade)) {
        alert('você deve ser maior de idade para ser um maquinista');
        return
    }
    if (isNaN(experiencia) || experiencia <= 0) {
        alert('você deve ter algum tempo de experiencia para trabalhar conosco');
        return
    }
}
function validarFormulario() {
    const nome = document.getElementById('usuario').value.trim();

    console.log(usuario);

    if (!usuario) {
        alert('por favor, preencha o seu email');
        return;
    }
}
function validarFormulario()