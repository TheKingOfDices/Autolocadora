<?php
include 'conexao.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "SELECT l.*, c.cliente_nome, v.veiculo_descricao 
            FROM tblocacao l 
            LEFT JOIN tbcliente c ON l.locacao_cliente = c.cliente_cpf
            LEFT JOIN tbveiculo v ON l.locacao_veiculo = v.veiculo_placa
            WHERE l.locacao_codigo = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $locacao = $result->fetch_assoc();
    } else {
        echo "Locação não encontrada.";
        exit;
    }
} else {
    echo "Código da locação não especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = $_POST['cliente'];
    $veiculo = $_POST['veiculo'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $sql_update = "UPDATE tblocacao 
                   SET locacao_cliente = ?, locacao_veiculo = ?, locacao_data_inicio = ?, locacao_data_fim = ? 
                   WHERE locacao_codigo = ?";
    $stmt_update = $conexao->prepare($sql_update);
    $stmt_update->bind_param("ssssi", $cliente, $veiculo, $data_inicio, $data_fim, $codigo);

    if ($stmt_update->execute()) {
        header("Location: listarlocacoes.php");
        exit;
    } else {
        echo "Erro ao atualizar a locação.";
    }
}

$sql_clientes = "SELECT * FROM tbcliente";
$result_clientes = $conexao->query($sql_clientes);

$sql_veiculos = "SELECT * FROM tbveiculo";
$result_veiculos = $conexao->query($sql_veiculos);
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
    <form method="POST" action="">
        <label for="cliente">Cliente:</label>
        <select id="cliente" name="cliente" required>
            <?php while ($cliente = $result_clientes->fetch_assoc()): ?>
                <option value="<?= $cliente['cliente_cpf'] ?>" <?= $cliente['cliente_cpf'] == $locacao['locacao_cliente'] ? 'selected' : '' ?>>
                    <?= $cliente['cliente_nome'] ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="veiculo">Veículo:</label>
        <select id="veiculo" name="veiculo" required>
            <?php while ($veiculo = $result_veiculos->fetch_assoc()): ?>
                <option value="<?= $veiculo['veiculo_placa'] ?>" <?= $veiculo['veiculo_placa'] == $locacao['locacao_veiculo'] ? 'selected' : '' ?>>
                    <?= $veiculo['veiculo_descricao'] ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="data_inicio">Data de Início:</label>
        <input type="date" id="data_inicio" name="data_inicio" value="<?= $locacao['locacao_data_inicio'] ?>" required><br><br>

        <label for="data_fim">Data de Fim:</label>
        <input type="date" id="data_fim" name="data_fim" value="<?= $locacao['locacao_data_fim'] ?>"><br><br>

        <input type="submit" value="Atualizar Locação">
    </form>
    <a href="listarlocacoes.php">Voltar à lista de locações</a>
</main>
</body>
</html>