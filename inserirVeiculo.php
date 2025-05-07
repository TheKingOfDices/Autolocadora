<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Veículo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_POST['placa'], $_POST['descricao'], $_POST['marca'])) {
    $placa = $_POST['placa'];
    $descricao = $conexao->real_escape_string($_POST['descricao']);
    $marca = $_POST['marca'];

    $sql = "INSERT INTO tbveiculo (veiculo_placa, veiculo_descricao, veiculo_marca)
            VALUES ('$placa', '$descricao', $marca)";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Veículo cadastrado com sucesso!</p>";
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
