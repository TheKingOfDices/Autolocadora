<?php
include 'conexao.php';
$codigo = $_GET['codigo'];
$sql = "SELECT * FROM tbmarca WHERE marca_codigo = $codigo";
$result = $conexao->query($sql);
$marca = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Marca</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
    <h2>Editar Marca</h2>
    <form action="atualizarMarca.php" method="POST">
        <input type="hidden" name="codigo" value="<?= $marca['marca_codigo'] ?>">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="<?= $marca['marca_descricao'] ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
    <a href="listarmarcas.php" class="voltar-link">Voltar</a>
</main>
</body>
</html>