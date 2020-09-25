<?php

session_start();
include('../app/database.php');

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    header('Location: ../cadastro.php');
}

$username = mysqli_real_escape_string($connect_db, $_POST['username']);
$email = mysqli_real_escape_string($connect_db, $_POST['email']);
$password_for_encrypt = mysqli_real_escape_string($connect_db, $_POST['password']);
$password = md5($password_for_encrypt);


// Checar se existe um usuario ou email já cadastrado
$query = "SELECT username FROM accounts WHERE CONCAT(username) = '{$username}' OR CONCAT(email) = '{$email}'";
$result = mysqli_query($connect_db, $query);
$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['exite_valor'] = true;
    header("Location: ../cadastro.php");
    exit();
}

//Se nao tiver registro faz a inserção
$query="INSERT INTO accounts (username, email, password) VALUES ('{$username}', '{$email}', '{$password}');";
$result = mysqli_query($connect_db, $query);

//If/else do registro
if ($result == 1) {
    $_SESSION['perfil_criado'] = true;
    header('Location: ../index.php');
    exit();
} else {
    echo "Oops ocorreu um erro: " . $sql . "<br>" . mysqli_error($conn);
    exit();
}