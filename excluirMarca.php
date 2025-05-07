<?php
include 'conexao.php';

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
echo "<a class='btn-voltar' href='listarMarcas.php'>Voltar</a>";
?>