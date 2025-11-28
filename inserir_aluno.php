<?php
include "conexao.php";

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$serie = $_POST['serie'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$materia = $_POST['materia'];
$escola = $_POST['escola'];
$id_escola = $_POST['id_escola'];

// Comando SQL — atualizado conforme novo banco de dados
$sql = "INSERT INTO tb_aluno 
        (nome, cpf, data_nascimento, serie, email, senha, materia, escola, id_escola) 
        VALUES 
        ('$nome', '$cpf', '$data_nascimento', '$serie', '$email', '$senha', '$materia', '$escola', '$id_escola')";

// Preparar o SQL
$inserir = $pdo->prepare($sql);

// Tentar executar
try {
    $inserir->execute();
    echo "Cadastrado com sucesso!";
} catch (PDOException $erro) {
    echo "Falha ao inserir! " . $erro->getMessage();
}
?>
