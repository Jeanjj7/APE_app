<?php
include "conexao.php";

$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$area = $_POST['area_conhecimento'];
$disp = $_POST['disponibilidade'];

$sql = "INSERT INTO tb_voluntario
        (nome, data_nascimento, cpf, email, senha, area_conhecimento, disponibilidade)
        VALUES
        ('$nome', '$data_nascimento', '$cpf', '$email', '$senha', '$area', '$disp')";

$inserir = $pdo->prepare($sql);

try {
    $inserir->execute();
    echo "Voluntário cadastrado com sucesso!";
} catch (PDOException $erro) {
    echo "Erro ao cadastrar voluntário! " . $erro->getMessage();
}
?>
