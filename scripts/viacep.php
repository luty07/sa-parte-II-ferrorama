<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cep = preg_replace("/[^0-9]/", "", $_POST["cep"]);

    if (strlen($cep) != 8) {
        $mensagem = "<div class='resultado erro'>Digite um CEP válido com 8 números.</div>";
    } else {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = @file_get_contents($url);

        if ($response) {
            $data = json_decode($response, true);
            if (isset($data["erro"])) {
                $mensagem = "<div class='resultado erro'>CEP não encontrado.</div>";
            } else {
                $mensagem = "<div class='resultado'>
                    <strong>Endereço encontrado:</strong><br>
                    {$data['logradouro']}, {$data['bairro']}<br>
                    {$data['localidade']} - {$data['uf']}
                </div>";
            }
        } else {
            $mensagem = "<div class='resultado erro'>Erro ao buscar o CEP.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de CEP - RailTrack</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Consulta de CEP - RailTrack</h2>

    <form method="POST" action="">
        <label for="cep">Digite o CEP:</label><br>
        <input type="text" name="cep" id="cep" placeholder="Ex: 01001000" required>
        <input type="submit" value="Buscar CEP">
    </form>

    <?php
        if (!empty($mensagem)) {
            echo $mensagem;
        }
    ?>
</body>
</html>