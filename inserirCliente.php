<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_POST['cpf'], $_POST['nome'], $_POST['endereco'])) {
    $cpf = $_POST['cpf'];
    $nome = $conexao->real_escape_string($_POST['nome']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);

    $sql = "INSERT INTO tbcliente (cliente_cpf, cliente_nome, cliente_endereco)
            VALUES ('$cpf', '$nome', '$endereco')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Cliente cadastrado com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>❗ Preencha todos os campos.</p>";
}
?>
<a class="btn-voltar" href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>
