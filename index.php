<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $idade = mysqli_real_escape_string($conexao, $_POST['idade']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

    // Remover caracteres não numéricos do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verificar se o CPF possui 11 dígitos
    if (strlen($cpf) !== 11) {
        echo "CPF deve ter 11 dígitos.";
        exit();
    }

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
        <div class="welcome">
            <h1 class="pptitulo">Bem-vindo a Journey to Heaven</h1>
            <h3 class="pp">Acesse sua conta ou crie uma nova conta para utilizar o nosso site!</h3>
            <button type="text" name="irLogin" class="botaologin"><a href="testLogin.php">LOGIN</a></button>
            <div class="login">

                <h2>Registrar Usuário</h2>
                <p><input type="text" name="nome" id="nome" placeholder="NOME" required></p>
                <p><input type="number" name="idade" id="idade" placeholder="IDADE" required></p>
                <p><input type="text" name="cpf" id="cpf" placeholder="CPF" required></p>
                <p><input type="password" name="senha" id="senha  " placeholder="SENHA" required></p>
                <p><input type=" text" name="telefone" id="telefone" placeholder="TELEFONE" required></p>
                <p class="botoes">
                    <button type="submit" name="submit" id="submit" class="cadastrar">CADASTRAR</button>
                </p>
            </div>
        </div>
    </form>

</body>
</html>