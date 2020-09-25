<?php
date_default_timezone_set('Europe/Lisbon');

include('app/database.php');

if (!isset($_GET['exluir'])) {
} else {
    $id = $_GET['exluir'];

    $query = "SELECT id, username, email, PASSWORD, enabled, profile, update_time FROM accounts WHERE id = '{$id}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se nao existir o ID passado via GET volta para a lista de usuarios
    if ($row == 0) {
        header("Location: ../usuarios.php");
        exit();
    }

    //Deleta o respectivo usuario
    $query="DELETE FROM accounts WHERE id='{$id}';";
    $result = mysqli_query($connect_db, $query);

    $_SESSION['deletado_com_sucesso'] = true;
    header("Location: ../usuarios.php");
    exit();   
}

if (!isset($_GET['usuario'])) {
} else {
    $id = $_GET['usuario'];

    $query = "SELECT id, username, email, PASSWORD, enabled, profile, update_time FROM accounts WHERE id = '{$id}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se nao existir o ID passado via GET volta para a lista de usuarios
    if ($row == 0) {
        header("Location: ../usuarios.php");
        exit();
    }

    // Cria variaveis do respectivo usuario
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $enabled = $row["enabled"];
        $password = $row["PASSWORD"];
        $profile = $row["profile"];
    }

    

}
