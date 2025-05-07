<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Marca</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM tbmarca WHERE marca_codigo = '$codigo'";
    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Marca excluída com sucesso.</p>";
    } else {
        echo "<p>❌ Erro ao excluir: " . $conexao->error . "</p>";
    }
} else {
    echo "<p>❗ Nenhuma marca informada.</p>";
}
?>
    <a class="btn-voltar" href="listarMarcas.php">Voltar</a>
</main>
</body>
</html>