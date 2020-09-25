<?php
date_default_timezone_set('Europe/Lisbon');

session_start();
include('../app/database.php');

if(empty($_POST['title'])) {
    $_SESSION['titulo_vazio'] = true;
    header("Location: ../novo-projeto.php");
    exit();
}

//Cria as variaveis globais
$title = mysqli_real_escape_string($connect_db, $_POST['title']);
$description = mysqli_real_escape_string($connect_db, $_POST['description']);
$create_time = date('Y-m-d H:i:s', time());

//Faz a inserção do projeto
$query="INSERT INTO projects (title, description, create_time) 
VALUES ('{$title}', '{$description}', '{$create_time}');";
$result = mysqli_query($connect_db, $query);

// Cria variavel do id do usuario e do id do projeto que foi criado
$id_usuario = $_SESSION['id'];
$id_projeto = $connect_db->insert_id;

//Faz a inserção do id do projeto/usuario na table accounts_projects
$query="INSERT INTO accounts_projects (accounts_id, projects_id) 
VALUES ('{$id_usuario}', '{$id_projeto}');";
$result = mysqli_query($connect_db, $query);

//If/else do registro
if ($result == 1) {
    $_SESSION['projeto_criado_com_sucesso'] = true;
    header("Location: ../projeto.php?projeto=$id_projeto");
    exit();
} else {
    echo "Oops ocorreu um erro: " . $sql . "<br>" . mysqli_error($conn);
    exit();
}
