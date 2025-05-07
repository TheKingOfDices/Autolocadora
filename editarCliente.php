<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf_antigo = $_POST['cpf_antigo'];
    $cpf_novo = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE tbcliente SET 
                cliente_cpf = '$cpf_novo',
                cliente_nome = '$nome',
                cliente_endereco = '$endereco' 
            WHERE cliente_cpf = '$cpf_antigo'";

    if ($conexao->query($sql) === TRUE) {
        header("Location: listarClientes.php");
        exit;
    } else {
        echo "Erro ao atualizar cliente: " . $conexao->error;
    }
} else {
    $cpf = $_GET['cpf'] ?? '';
    $sql = "SELECT * FROM tbcliente WHERE cliente_cpf = '$cpf'";
    $result = $conexao->query($sql);

    if ($result->num_rows === 0) {
        echo "Cliente não encontrado.";
        exit;
    }

    $cliente = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h2>Editar Cliente</h2>
        <form method="POST">
            <input type="hidden" name="cpf_antigo" value="<?= $cliente['cliente_cpf'] ?>">

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required maxlength="11" pattern="\d{11}" value="<?= $cliente['cliente_cpf'] ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required value="<?= $cliente['cliente_nome'] ?>">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" required value="<?= $cliente['cliente_endereco'] ?>">

            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="listarClientes.php" class="voltar-link">Voltar</a>
    </main>
</body>
</html>