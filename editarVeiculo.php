<?php
include 'conexao.php';
$codigo = $_GET['codigo'];
$sql = "SELECT * FROM tblocacao WHERE locacao_codigo = $codigo";
$result = $conexao->query($sql);
$locacao = $result->fetch_assoc();
$veiculos = $conexao->query("SELECT veiculo_placa FROM tbveiculo");
$clientes = $conexao->query("SELECT cliente_cpf, cliente_nome FROM tbcliente");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Locação</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Editar Locação</h2>
    <form action="atualizarLocacao.php" method="POST">
        <input type="hidden" name="codigo" value="<?= $locacao['locacao_codigo'] ?>">

        <label for="placa">Veículo (Placa):</label>
        <select name="placa" id="placa" required>
            <?php while ($row = $veiculos->fetch_assoc()): ?>
                <option value="<?= $row['veiculo_placa'] ?>" <?= $row['veiculo_placa'] == $locacao['locacao_veiculo'] ? 'selected' : '' ?>>
                    <?= $row['veiculo_placa'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="cliente">Cliente (CPF):</label>
        <select name="cliente" id="cliente" required>
            <?php while ($row = $clientes->fetch_assoc()): ?>
                <option value="<?= $row['cliente_cpf'] ?>" <?= $row['cliente_cpf'] == $locacao['locacao_cliente'] ? 'selected' : '' ?>>
                    <?= $row['cliente_nome'] ?> (<?= $row['cliente_cpf'] ?>)
                </option>
            <?php endwhile; ?>
        </select>

        <label for="data_inicio">Data Início:</label>
        <input type="date" name="data_inicio" id="data_inicio" value="<?= $locacao['locacao_data_inicio'] ?>" required>

        <label for="data_fim">Data Fim:</label>
        <input type="date" name="data_fim" id="data_fim" value="<?= $locacao['locacao_data_fim'] ?>">

        <button type="submit">Salvar Alterações</button>
    </form>
    <a href="listarLocacoes.php" class="voltar-link">Voltar</a>
</main>
</body>
</html>