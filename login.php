<?php
session_start();
include_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1>Faça seu login</h1>
        <hr>

        <form action="funcoes.php" method="POST" class="mt-5">
            <input type="hidden" name="operacao" value="login">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" placeholder="example@mail.com">
            <br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            <br><br>
            <input type="submit" value="Entrar" class="btn btn-success">
        </form>
        <br>
        <a href="cadastrar.php">
            <p>Cadastrar novo usuário</p>
        </a>

        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>