<?php
include "conexao.php";

$usuario = $_POST['usuario_digitado']; // pode ser email ou cpf
$senha   = $_POST['senha_digitada'];

// SQL aceitando CPF OU Email
$sql = "SELECT * FROM tb_aluno
        WHERE (email = :usuario OR cpf = :usuario)
        AND senha = :senha";

$consulta = $pdo->prepare($sql);

try {
    $consulta->execute([
        ':usuario' => $usuario,
        ':senha'   => $senha
    ]);

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        session_start();
        $_SESSION['aluno_logado'] = "sim";
        $_SESSION['id_aluno'] = $resultado['id_aluno'];
        $_SESSION['nome_aluno'] = $resultado['nome'];

        echo "sucesso"; // retorno para o AJAX
    } else {
        echo "erro"; // login incorreto
    }
} catch (PDOException $erro) {
    echo "Falha no login! ".$erro->getMessage();
}
?>
