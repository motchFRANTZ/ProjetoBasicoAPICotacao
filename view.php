<?php

require "RequestApi.php";

$moedas = new RequestApi();
$response = $moedas->getResponse();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<nav class="navbar">
    <div class="navbar-container">
        <a class="titulo">Motch Câmbio</a>
    </div>
</nav>

<div class="container">
<!--    <div class="titulo">-->
<!--        <h1>Motch Câmbio</h1>-->
<!--    </div>-->
    <div class="container-moedas">
        <?php foreach ($response as $moeda): ?>
            <div class="moeda">
                <p class="nome-moeda"><?php echo $moeda['name'] ?></p>
                <p>Valor máximo: <strong>R$ <?php echo number_format($moeda['high'], 2, ',', '.') ?></strong></p>
                <p>Valor mínimo: <strong>R$ <?php echo number_format($moeda['low'], 2, ',', '.') ?></strong></p>
                <p>Valor de Compra: <strong>R$ <?php echo number_format($moeda['bid'], 2, ',', '.') ?></strong></p>
                <p>Valor de Venda: <strong>R$ <?php echo number_format($moeda['ask'], 2, ',', '.') ?></strong></p>
            </div>
        <?php endforeach; ?>

    </div>
</div>
</body>
</html>
