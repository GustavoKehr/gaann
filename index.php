<?php
    if(isset($_POST['submit'])) {
        include_once('config.php');

        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $idade = mysqli_real_escape_string($conexao, $_POST['idade']);
        $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        
        $stmt = $conexao->prepare("INSERT INTO clientes (nome, idade, cpf, senha, telefone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sissi", $nome, $idade, $cpf, $senha, $telefone);

        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso.";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        $stmt->close();
        $conexao->close();
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="POST">
        <div class="login">

            <p><input type="text" name="nome" id="nome" placeholder="nome" required></p>
            <p><input type="number" name="idade" id="idade" placeholder="idade" required></p>
            <p><input type="text" name="cpf" id="cpf" placeholder="cpf" required></p>
            <p><input type="password" name="senha" id="senha  " placeholder="senha" required></p>
            <p><input type=" text" name="telefone" id="telefone" placeholder="telefone" required></p>
            <p><button type="submit" name="submit" id="submit">ENVIAR</button></p>
        </div>
    </form>

</body>
</html>