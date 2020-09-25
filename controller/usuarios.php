<?php
include('app/database.php');

if(!$_SESSION['username']){
    header('Location: ../index.php');
    exit();
}

// Obter todos os usuarios
$query = "SELECT id, username, email, enabled, create_time FROM accounts";
$result = mysqli_query($connect_db, $query);
