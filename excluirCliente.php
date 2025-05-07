<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Cliente</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "DELETE FROM tbcliente WHERE cliente_cpf = '$cpf'";
    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Cliente excluído com sucesso.</p>";
    } else {
        echo "<p>❌ Erro ao excluir: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>❗ Nenhum cliente informado.</p>";
}
?>
    <a class="btn-voltar" href="listarClientes.php">Voltar</a>
</main>
</body>
</html>