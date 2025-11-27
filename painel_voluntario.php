<?php
session_start();  
include "conexao.php";

// Se NÃO estiver logado, manda para o login
if (!isset($_SESSION['voluntario_logado']) || $_SESSION['voluntario_logado'] != "sim") {
    header("Location: login_voluntario.php");
    exit;
}

$id_voluntario = $_SESSION['id_voluntario'];

// Buscar nome E CPF no banco
$sql = "SELECT nome, cpf FROM tb_voluntario WHERE id_voluntario = :id";
$consulta = $pdo->prepare($sql);

$consulta->execute([":id" => $id_voluntario]);

$dados = $consulta->fetch(PDO::FETCH_ASSOC);

// Se não achar (algo deu errado), volta para login
if (!$dados) {
    header("Location: login_voluntario.php");
    exit;
}

$nomecv = $dados['nome'];
$cpfcv  = $dados['cpf'];
?>
