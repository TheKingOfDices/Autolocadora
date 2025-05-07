<?php
include 'conexao.php';

$sqlLocados = "SELECT locacao_veiculo FROM tblocacao WHERE locacao_data_fim IS NULL";
$resultLocados = $conexao->query($sqlLocados);
$placasLocadas = [];

if ($resultLocados) {
    while ($row = $resultLocados->fetch_assoc()) {
        $placasLocadas[] = $row['locacao_veiculo'];
    }
}

$sql = "SELECT v.*, m.marca_descricao FROM tbveiculo v
        LEFT JOIN tbmarca m ON v.veiculo_marca = m.marca_codigo";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Status dos Veículos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Status dos Veículos</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr><th>Placa</th><th>Descrição</th><th>Marca</th><th>Status</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['veiculo_placa'] ?></td>
                    <td><?= $row['veiculo_descricao'] ?></td>
                    <td><?= $row['marca_descricao'] ?></td>
                    <td>
                        <?= in_array($row['veiculo_placa'], $placasLocadas) ? 'Locado' : 'Disponível' ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum veículo encontrado.</p>
    <?php endif; ?>
    <a href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>