<?php
    include_once('conexao.php');
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastre-se</h1>

    <form action="funcoes.php" method="POST">
        <input type="hidden" name="operacao" value="cadastrarUsuario">

        <label for="nome">Nome: </label>
        
        <input type="text" id="nome" name="nome"> <br><br>
        
        <label for="email">E-mail: </label>
        
        <input type="email" name="email" id="email" placeholder="example@mail.com">
        
        <br><br>
        
        <label for="senha">Senha: </label>
        
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        
        <br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <p>Já possui uma conta? clique <a href="login.php">aqui</a> para fazer login</p>
    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


