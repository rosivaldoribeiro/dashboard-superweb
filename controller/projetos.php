<?php
include('app/database.php');

if(!$_SESSION['username']){
    header('Location: ../index.php');
    exit();
}

// Obter todos os usuarios
$query = "SELECT id, title, description, create_time FROM projects";
$result = mysqli_query($connect_db, $query);
