<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Veículo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h2>Cadastro de Veículo</h2>
        <form action="inserirVeiculo.php" method="POST">
            <label for="placa">Placa:</label>
            <input type="text" name="placa" id="placa" required maxlength="8" pattern="[A-Z0-9]{7,8}" title="Placa com 7 ou 8 caracteres (letras e números)">

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" required maxlength="100">

            <label for="marca">Marca:</label>
            <select name="marca" id="marca" required>
                <?php
                $sql = "SELECT * FROM tbmarca";
                $result = $conexao->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['marca_codigo']}'>{$row['marca_descricao']}</option>";
                }
                ?>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" class="voltar-link">Voltar ao Menu</a>
    </main>
</body>
</html>