<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h2>Cadastro de Cliente</h2>
        <form action="inserirCliente.php" method="POST">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required maxlength="11" pattern="\d{11}" title="Informe 11 números">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required maxlength="100">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" required maxlength="150">

            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" class="voltar-link">Voltar ao Menu</a>
    </main>
</body>
</html>
