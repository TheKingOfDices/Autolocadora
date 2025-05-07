<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Veículo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_GET['placa'])) {
    $placa = $_GET['placa'];

    $sql = "DELETE FROM tbveiculo WHERE veiculo_placa = '$placa'";
    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Veículo excluído com sucesso.</p>";
    } else {
        echo "<p>❌ Erro ao excluir: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>❗ Nenhum veículo informado.</p>";
}
?>
    <a class="btn-voltar" href="listarVeiculos.php">Voltar</a>
</main>
</body>
</html>