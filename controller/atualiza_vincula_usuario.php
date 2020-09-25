<?php
date_default_timezone_set('Europe/Lisbon');

session_start();
include('../app/database.php');

if(empty($_POST['title']) || empty($_POST['username'])) {
    header("Location: ../projeto.php?projeto=$id");
    exit();
}

//Cria as variaveis globais
$id_projeto = mysqli_real_escape_string($connect_db, $_POST['title']);
$id_usuario = mysqli_real_escape_string($connect_db, $_POST['username']);

$query = "INSERT INTO accounts_projects (accounts_id, projects_id) VALUES ('{$id_usuario}', '$id_projeto');";
$result = mysqli_query($connect_db, $query);
$row = mysqli_num_rows($result);

$_SESSION['usuario_vinculado_com_sucesso'] = true;
header("Location: ../projeto.php?projeto=$id_projeto");
exit();

