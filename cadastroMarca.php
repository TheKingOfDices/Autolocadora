<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Marca</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h2>Cadastro de Marca</h2>
        <form action="inserirMarca.php" method="POST">
            <label for="codigo">Código da Marca:</label>
            <input type="number" name="codigo" id="codigo" required min="1" max="9999">

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" required maxlength="100">

            <button type="submit">Cadastrar Marca</button>
        </form>
        <a href="index.php" class="voltar-link">Voltar ao Menu</a>
    </main>
</body>
</html>