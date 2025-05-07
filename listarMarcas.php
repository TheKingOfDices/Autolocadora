<?php
include 'conexao.php';
$sql = "SELECT * FROM tbmarca";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Marcas Cadastradas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Marcas Cadastradas</h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr><th>Código</th><th>Descrição</th><th>Ações</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['marca_codigo'] ?></td>
                    <td><?= $row['marca_descricao'] ?></td>
                    <td>
                        <a href="editarMarca.php?codigo=<?= $row['marca_codigo'] ?>">✏️ Editar</a> | 
                        <a href="excluirMarca.php?codigo=<?= $row['marca_codigo'] ?>" onclick="return confirm('Deseja excluir esta marca?')">🗑️ Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhuma marca cadastrada.</p>
    <?php endif; ?>
    <a href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>