<?php
// viacep.php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>RAILTRACK</title>
<link rel="stylesheet" href="style.css">

    <script>
        async function buscarEndereco() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');

            if (cep.length !== 8) {
                alert("Digite um CEP válido (8 dígitos).");
                return;
            }

            try {
                const res = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const data = await res.json();

                if (data.erro) {
                    alert("CEP não encontrado.");
                    return;
                }

                document.getElementById('rua').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('cidade').value = data.localidade || '';
                document.getElementById('estado').value = data.uf || '';

            } catch (err) {
                alert("Erro ao buscar CEP.");
            }
        }
    </script>
</head>
<body>
    <h2>VERIFICAR CEP</h2>
    <form action="perfilviacep.php" method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CEP:</label>
        <input type="text" id="cep" name="cep" maxlength="9" onblur="buscarEndereco()" required>

        <label>Rua:</label>
        <input type="text" id="rua" name="rua" readonly>

        <label>Bairro:</label>
        <input type="text" id="bairro" name="bairro" readonly>

        <label>Cidade:</label>
        <input type="text" id="cidade" name="cidade" readonly>

        <label>Estado:</label>
        <input type="text" id="estado" name="estado" readonly>

        <button type="submit">Verificar</button>
    </form>
</body>
</html>
