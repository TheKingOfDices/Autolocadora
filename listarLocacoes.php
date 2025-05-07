<?php
include 'conexao.php';
$sql = "SELECT l.*, c.cliente_nome, v.veiculo_descricao
        FROM tblocacao l
        LEFT JOIN tbcliente c ON l.locacao_cliente = c.cliente_cpf
        LEFT JOIN tbveiculo v ON l.locacao_veiculo = v.veiculo_placa";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Locações</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Locações</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr><th>Código</th><th>Veículo</th><th>Cliente</th><th>Início</th><th>Fim</th><th>Ações</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['locacao_codigo'] ?></td>
                    <td><?= $row['veiculo_descricao'] ?></td>
                    <td><?= $row['cliente_nome'] ?></td>
                    <td><?= $row['locacao_data_inicio'] ?></td>
                    <td><?= $row['locacao_data_fim'] ?: 'Em aberto' ?></td>
                    <td>
                        <a href="editarLocacao.php?codigo=<?= $row['locacao_codigo'] ?>">✏️ Editar</a> | 
                        <a href="excluirLocacao.php?codigo=<?= $row['locacao_codigo'] ?>" onclick="return confirm('Deseja excluir esta locação?')">🗑️ Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhuma locação cadastrada.</p>
    <?php endif; ?>
    <a href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>