<?php
$conexao = new mysqli("localhost", "root", "", "autolocadora2025");
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>