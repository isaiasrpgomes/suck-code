<?php


if (!empty($_GET['id'])) {

    include_once('conexao.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM noticias WHERE id=$id";
    $res = $conn->query($query);


    if ($res->num_rows > 0) {
        while ($data = mysqli_fetch_assoc($res)) {

            $titulo = $data['titulo'];
            $subtitulo = $data['subtitulo'];
            $descricao = $data['descricao'];
        }
    } else {
        header("Location: painel.php");
    }

    $id = $_GET['id'];

    
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Editar notícia</title>
</head>

<body>
    <h1>Editar notícia</h1>
    <hr>
    <a href="painel.php">Voltar</a>

    <?php



    ?>
    <form action="salvar_noticia.php" method="POST">
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo" required value="<?php echo $titulo ?>"> <br></br>
        <label for="subtitulo">Subtítulo: </label>
        <input type="text" name="subtitulo" id="subtitulo" required value="<?php echo $subtitulo ?>">
        <br><br>
        <label for="descricao">Descrição: </label> <br>
        <textarea name="descricao" id="descricao" cols="30" rows="10" required ><?php echo $descricao ?></textarea> <br><br>
        <input type="submit" value="Atualizar Notícia" name="update" id="update">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <br> <br>
    </form>
<script src="js/bootstrap.min.js"></script>
</body>

</html>