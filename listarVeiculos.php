<?php
include 'conexao.php';
$sql = "SELECT v.*, m.marca_descricao FROM tbveiculo v
        LEFT JOIN tbmarca m ON v.veiculo_marca = m.marca_codigo";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Veículos Cadastrados</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Veículos Cadastrados</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr><th>Placa</th><th>Descrição</th><th>Marca</th><th>Ações</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['veiculo_placa'] ?></td>
                    <td><?= $row['veiculo_descricao'] ?></td>
                    <td><?= $row['marca_descricao'] ?></td>
                    <td>
                        <a href="editarVeiculo.php?placa=<?= $row['veiculo_placa'] ?>" class="editar">✏️ Editar</a>
                        <a href="excluirVeiculo.php?placa=<?= $row['veiculo_placa'] ?>" onclick="return confirm('Deseja excluir este veículo?')" class="excluir">🗑️ Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum veículo cadastrado.</p>
    <?php endif; ?>
    <a href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>