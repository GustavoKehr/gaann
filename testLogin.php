<?php
if(isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {
    include_once('config.php');

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM clientes WHERE cpf = ? and senha = ?");
    $stmt->bind_param("ss", $cpf, $senha);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário autenticado, faça o que precisar aqui
        echo "Login bem-sucedido!";
    } else {
        // Usuário não autenticado
        echo "Login falhou. CPF ou senha incorretos.";
    }

    $stmt->close();
    $conexao->close();
} else {
    header('Location: login.php');
    exit();
}
?>