<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, cyan, yellow);
    }

    div {
        background-color: rgba(0, 0, 0, 0.9);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 80px;
        border-radius: 15px;
        color: #fff;
    }

    input {
        padding: 15px;
        border: none;
        outline: none;
        font-size: 15px;
        border-radius: 10px;
    }

    .inputSubmit {
        background-color: dodgerblue;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: white;
        font-size: 15px;

    }

    .inputSubmit:hover {
        background-color: deepskyblue;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div>
        <form action="testLogin.php" method="POST">
            <h1>Login</h1>
            <input type="text" name="cpf" placeholder="CPF">
            <br><br>
            <input type="password" name="senha" placeholder="SENHA">
            <br><br>
            <input type="submit" name="submit" value="Enviar" class="inputSubmit">
        </form>
    </div>
</body>
</html>