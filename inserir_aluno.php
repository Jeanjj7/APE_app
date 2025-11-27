<?php
include "conexao.php";

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$idade = $_POST['idade'];
$serie = $_POST['serie'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$materia = $_POST['materia'];
$id_escola = $_POST['id_escola'];

// Comando SQL
$sql = "INSERT INTO tb_aluno 
        (nome, cpf, data_nascimento, idade, serie, email, senha, materia, id_escola) 
        VALUES 
        ('$nome', '$cpf', '$data_nascimento', '$idade', '$serie', '$email', '$senha', '$materia', '$id_escola')";

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
