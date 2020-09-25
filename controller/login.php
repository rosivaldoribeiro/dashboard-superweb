<?php
session_start();
include('../app/database.php');

if(empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: ../index.php');
}

$username = mysqli_real_escape_string($connect_db, $_POST['username']);
$password = mysqli_real_escape_string($connect_db, $_POST['password']);

$query = "SELECT id, username, password FROM accounts WHERE username = '{$username}' AND password = md5('{$password}')";


$result = mysqli_query($connect_db, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    while ($coluna = mysqli_fetch_assoc($result)) {
        $id = $coluna["id"];
        $login_time = date('Y-m-d H:i:s', time());

        $query = "INSERT INTO account_sessions (account_id, login_time) VALUES ('{$id}', '{$login_time}');";
        $result = mysqli_query($connect_db, $query);
    }

    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    header('Location: ../painel.php');
    exit();
} else {
    $_SESSION['auth_first'] = true;
    header('Location: ../index.php');
    exit();
}
