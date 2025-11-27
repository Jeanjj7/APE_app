<?php
include "conexao.php";

$usuario = $_POST['usuario_digitado']; // email ou CPF
$senha   = $_POST['senha_digitada'];

// SQL permitindo login com CPF ou E-mail
$sql = "SELECT * FROM tb_voluntario
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
        $_SESSION['voluntario_logado'] = "sim";
        $_SESSION['id_voluntario']     = $resultado['id_voluntario'];
        $_SESSION['nome_voluntario']   = $resultado['nome'];

        echo "sucesso"; // AJAX vai redirecionar
    } else {
        echo "erro"; // senha incorreta
    }

} catch (PDOException $erro) {
    echo "Falha no login! " . $erro->getMessage();
}
?>
