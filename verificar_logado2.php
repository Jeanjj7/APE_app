<?php
session_start();

// SE não estiver logado → volta pro login
if (!isset($_SESSION['voluntario_logado']) || $_SESSION['voluntario_logado'] != "sim") {
    header("Location: login_voluntario.html");
    exit;
}

// Criar variáveis que serão usadas no HTML
$nomecv = $_SESSION['nome_voluntario'];
$cpfcv  = $_SESSION['cpf_voluntario'];
?>
