<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Marca</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<main class="container">
<?php
if (isset($_POST['codigo'], $_POST['descricao'])) {
    $codigo = $_POST['codigo'];
    $descricao = $conexao->real_escape_string($_POST['descricao']);

    $sql = "INSERT INTO tbmarca (marca_codigo, marca_descricao)
            VALUES ($codigo, '$descricao')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>✅ Marca cadastrada com sucesso!</p>";
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