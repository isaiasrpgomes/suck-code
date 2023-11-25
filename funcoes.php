<?php
session_start();
include_once('conexao.php');

$oper = '';

if (isset($_POST['operacao']) && !empty($_POST['operacao'])) {
    $oper = $_POST['operacao'];
}

switch ($oper) {

    case 'cadastrarUsuario':
        cadastrarUsuario();
        break;

    case 'login':
        login();
        break;

    case 'cadastrarNoticia':
        cadastrarNoticia();
        break;

    case 'deletarNoticia':
        deletarNoticia();
        break;
}


function cadastrarUsuario()
{

    global $conn;

    if (
        isset($_POST['nome']) && !empty($_POST['nome'])
        && !empty($_POST['email'])
        && !empty($_POST['senha'])
    ) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        $res =  mysqli_query($conn, $query);

        if ($res) {
            header('Location: login.php');
        } else {
            header('Location: cadastrar.php');
        }
    }
}

function login()
{
    global $conn;

    if (
        isset($_POST['email'])
        && !empty($_POST['email'])
        && !empty($_POST['senha'])
    ) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";

        $res = mysqli_query($conn, $query);

        if ($res->num_rows > 0) {
            header('Location: painel.php');
            $_SESSION['login'] = true;
        } else {
            header("Location: login.php");
        }
    }
}

function cadastrarNoticia()
{
    global $conn;
    if (
        isset($_POST['titulo']) &&
        !empty($_POST['titulo']) &&
        !empty($_POST['subtitulo'] &&
            !empty($_POST['descricao']))
    ) {
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descricao = $_POST['descricao'];

        $query = "INSERT INTO noticias (titulo, subtitulo, descricao) VALUES ('$titulo', '$subtitulo', '$descricao')";

        $res = mysqli_query($conn, $query);

        if ($res) {
            header("Location: painel.php");
            $_SESSION['msg'] = "<p style='color: green;'>Notícia cadastrada com sucesso!</p>";
        } else {
            header("Location: painel.php");
            $_SESSION['msg'] = "<p style='color: red;'>Erro ao cadastrar notícia!</p>";
        }
    }
}

function mostrarNoticias()
{
    global $conn;
    $query = "SELECT * FROM noticias";
    $res = mysqli_query($conn, $query);
    while ($user_data = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $user_data['id'] . "</td>";
        echo "<td>" . $user_data['titulo'] . "</td>";
        echo "<td>" . $user_data['subtitulo'] . "</td>";
        echo "<td>" . $user_data['descricao'] . "</td>";
        echo "<td><a href='editar_noticia.php?id=$user_data[id]'><button class='btn btn-warning'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
      </svg></button> </a> 
      
      <form action='funcoes.php' method='POST' style='display: inline;'>  
        <input type='hidden' name='operacao' value='deletarNoticia'>
        <input type='hidden' name='idNoticia' value='$user_data[id]'>
        <button type='submit' class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
        <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
      </svg></button> </form> </td>";
        echo "</tr>";
    }
}

function deletarNoticia()
{
    global $conn;
    if (isset($_POST['idNoticia']) && !empty($_POST['idNoticia'])) {
        $idNoticia = $_POST['idNoticia'];
        $query = "DELETE FROM noticias WHERE id='$idNoticia';";
        $res = mysqli_query($conn, $query);

        if ($res) {
            header("Location: painel.php");
            echo "noticia excluida com sucesso";
        } else {
            header("Location: painel.php");
            echo "Erro ao excluir noticia";
        }
    }
}
