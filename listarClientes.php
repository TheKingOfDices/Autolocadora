<?php
include 'conexao.php';
$sql = "SELECT * FROM tbcliente";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Clientes Cadastrados</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr><th>CPF</th><th>Nome</th><th>Endereço</th><th>Ações</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['cliente_cpf'] ?></td>
                    <td><?= $row['cliente_nome'] ?></td>
                    <td><?= $row['cliente_endereco'] ?></td>
                    <td>
                        <a href="editarCliente.php?cpf=<?= $row['cliente_cpf'] ?>">✏️ Editar</a> | 
                        <a href="excluirCliente.php?cpf=<?= $row['cliente_cpf'] ?>" onclick="return confirm('Deseja excluir este cliente?')">🗑️ Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum cliente cadastrado.</p>
    <?php endif; ?>
    <a href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>