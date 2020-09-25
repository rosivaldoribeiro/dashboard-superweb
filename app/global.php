<?php
include('database.php');

//Configurações Globais
$site['nome_site'] = "Cyber Project";
$url = "http://login.localhost/";


//Configurações count para o dashboard - incial
    //Total Usuarios
    $total_query = "SELECT count(1) FROM accounts";
    $resultado_total = mysqli_query($connect_db, $total_query);
    $row = mysqli_fetch_array($resultado_total);
    $total_usuarios = $row[0];

    //Total Projetos
    $total_query = "SELECT count(1) FROM projects";
    $resultado_total = mysqli_query($connect_db, $total_query);
    $row = mysqli_fetch_array($resultado_total);
    $total_projetos = $row[0];

//Configurações do Usuário - Sessão
$id = $_SESSION['id'];

$query_get_user = "SELECT * FROM accounts WHERE id = '{$id}'";
$resultado_usuario_sessao = mysqli_query($connect_db, $query_get_user);

    // Cria variaveis do respectivo usuario
    while ($row = mysqli_fetch_assoc($resultado_usuario_sessao)) {
        $id_usuario_sessao = $row["id"];
        $nome_de_usuario = $row["username"];
        $email_do_usuario = $row["email"];
        $status_do_usuario = $row["enabled"];
        $imagem_do_perfil = $row["profile"];
    }

    //Se a conta estiver desativada redireciona para a pagina de login
    if ($status_do_usuario == 0) {
        $_SESSION['conta_desativada'] = true;
        header('Location: ../index.php');
        exit();
    }

