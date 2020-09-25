<?php
date_default_timezone_set('Europe/Lisbon');

$id = $_POST['id'];

session_start();
include('../app/database.php');

if(empty($_POST['title'])) {
    header("Location: ../projeto.php?projeto=$id");
    exit();
}

//Cria as variaveis globais
$title = mysqli_real_escape_string($connect_db, $_POST['title']);
$description = mysqli_real_escape_string($connect_db, $_POST['description']);
$update_time = date('Y-m-d H:i:s', time());

$query = "UPDATE projects 
    SET title = '{$title}', description = '{$description}', update_time = '{$update_time}'
    WHERE id='{$id}';";
$result = mysqli_query($connect_db, $query);
$row = mysqli_num_rows($result);

$_SESSION['usuario_atualizado_sucesso'] = true;
header("Location: ../projeto.php?projeto=$id");
exit();

