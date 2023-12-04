<?php
if(isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {
    include_once('config.php');

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM clientes cpfWHERE  = ? and senha = ?");
    $stmt->bind_param("ss", $cpf, $senha);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        header("Location: home.html");
    } else {
        
        echo "Login falhou. CPF ou senha incorretos.";
    }

    $stmt->close();
    $conexao->close();
} else {
    header('Location: login.php');
    exit();
}
?>