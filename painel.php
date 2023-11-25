<?php

include_once('conexao.php');
include_once('funcoes.php');

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Painel</title>
</head>

<body>
    <div class="container">

        <h1>Cadastre uma notícia</h1>
        <hr>

        <?php

        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        ?>
        <form action="funcoes.php" method="POST">
            <input type="hidden" name="operacao" value="cadastrarNoticia">
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" required> <br></br>
            <label for="subtitulo">Subtítulo: </label>
            <input type="text" name="subtitulo" id="subtitulo" required>
            <br><br>
            <label for="descricao">Descrição: </label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="10" required></textarea> <br><br>
            <input type="submit" value="Cadastrar notícia" class="btn btn-dark">
            <br> <br>
        </form>



        <table class="table table-secondary table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Subtítulo </th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
            mostrarNoticias();
            ?>
        </table>

        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>