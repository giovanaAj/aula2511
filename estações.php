<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title> 
    <link rel="stylesheet" href="style.css"> 
    <style>
        img {
            width: 200px;
            height: 200px;
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Descubra a Estação do Ano</h1>

    <form method="POST">
        <label for="data">Escolha uma data:</label>
        <input type="date" id="data" name="data" required>
        <input type="submit" value="Ver Estação">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Pega a data enviada
        $data = $_POST['data'];

        // Converte a data para um formato adequado
        $data_formatada = date('Y-m-d', strtotime($data));

        // Pega o mês e o dia da data
        $mes = date('m', strtotime($data_formatada));
        $dia = date('d', strtotime($data_formatada));

        // Define a estação com base no mês e dia
        $estacao = "";

        // Estações do ano (simplesmente com base no mês e no dia)
        if (($mes == 12 && $dia >= 21) || ($mes >= 1 && $mes <= 3 && !($mes == 3 && $dia >= 20))) {
            $estacao = "Verão";
            $imagem = "https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2023/12/solsticio-verao-equinocio-praia-sol.jpg?w=1200&h=900&crop=1";
        } elseif (($mes == 3 && $dia >= 20) || ($mes >= 4 && $mes <= 6)) {
            $estacao = "Outono";
            $imagem = "https://s3.static.brasilescola.uol.com.br/be/2021/03/outono.jpg";
        } elseif (($mes == 6 && $dia >= 21) || ($mes >= 7 && $mes <= 9 && !($mes == 9 && $dia >= 22))) {
            $estacao = "Inverno";
            $imagem = "https://s3.static.brasilescola.uol.com.br/img/2019/11/inverno-regiao-sul.jpg";
        } else {
            $estacao = "Primavera";
            $imagem = "https://s2.static.brasilescola.uol.com.br/img/2019/09/primavera.jpg";
        }

        // Exibe a estação e a imagem correspondente
        echo "<h2>Estação: $estacao</h2>";
        echo "<img src='$imagem' alt='$estacao'>";
    }
    ?>
</body>
</html>