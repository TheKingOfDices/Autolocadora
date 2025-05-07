<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Locação</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h2>Cadastro de Locação</h2>
        <form action="inserirLocacao.php" method="POST">
            <label for="codigo">Código da Locação:</label>
            <input type="number" name="codigo" id="codigo" required min="1" max="999999">

            <label for="placa">Veículo (Placa):</label>
            <select name="placa" id="placa" required>
                <?php
                $sql = "SELECT veiculo_placa FROM tbveiculo";
                $result = $conexao->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['veiculo_placa']}'>{$row['veiculo_placa']}</option>";
                }
                ?>
            </select>

            <label for="cliente">Cliente (CPF):</label>
            <select name="cliente" id="cliente" required>
                <?php
                $sql = "SELECT cliente_cpf, cliente_nome FROM tbcliente";
                $result = $conexao->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['cliente_cpf']}'>{$row['cliente_nome']} ({$row['cliente_cpf']})</option>";
                }
                ?>
            </select>

            <label for="data_inicio">Data Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" required>

            <label for="data_fim">Data Fim:</label>
            <input type="date" name="data_fim" id="data_fim">

            <button type="submit">Cadastrar Locação</button>
        </form>
        <a href="index.php" class="voltar-link">Voltar ao Menu</a>
    </main>
</body>
</html>