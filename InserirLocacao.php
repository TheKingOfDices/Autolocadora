<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Locação</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_POST['codigo'], $_POST['placa'], $_POST['cliente'], $_POST['data_inicio'])) {
    $codigo = $_POST['codigo'];
    $placa = $_POST['placa'];
    $cliente = $_POST['cliente'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = !empty($_POST['data_fim']) ? "'{$_POST['data_fim']}'" : "NULL";

    $sql = "INSERT INTO tblocacao (locacao_codigo, locacao_veiculo, locacao_cliente, locacao_data_inicio, locacao_data_fim)
            VALUES ($codigo, '$placa', '$cliente', '$data_inicio', $data_fim)";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Locação cadastrada com sucesso!</p>";
    } else {
        echo "<p>❌ Erro: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>❗ Preencha todos os campos obrigatórios.</p>";
}
?>
<a class="btn-voltar" href="index.php">Voltar ao Menu</a>
</main>
</body>
</html>
