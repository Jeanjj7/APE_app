<?php
include "conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$area = $_POST['area_conhecimento'];
$disp = $_POST['disponibilidade'];
$senha = $_POST['senha'];

$sql = "INSERT INTO tb_voluntario
        (nome, cpf, email, senha, area_conhecimento, disponibilidade)
        VALUES
        ('$nome', '$cpf', '$email', '$senha', '$area', '$disp')";

$inserir = $pdo->prepare($sql);

try {
    $inserir->execute();
    echo "Voluntário cadastrado com sucesso!";
} catch (PDOException $erro) {
    echo "Erro ao cadastrar voluntário! " . $erro->getMessage();
}
?>
