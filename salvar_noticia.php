<?php
include_once('conexao.php');

if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $descricao = $_POST['descricao'];

    $query = "UPDATE noticias SET titulo='$titulo', subtitulo= '$subtitulo', descricao= '$descricao' WHERE id= '$id'";

    $res = mysqli_query($conn,$query);
}
    header("Location: painel.php");
?>
