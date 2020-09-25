<?php
date_default_timezone_set('Europe/Lisbon');

include('app/database.php');



if (!isset($_GET['excluir'])) {
} else {
    $id = $_GET['excluir'];

    $query = "SELECT id, title, description, create_time FROM projects WHERE id = '{$id}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se nao existir o ID passado via GET volta para a lista de usuarios
    if ($row == 0) {
        header("Location: ../projetos.php");
        exit();
    }

    //Deleta os usuarios vinculado ao projeto
    $query="DELETE FROM accounts_projects WHERE projects_id ='{$id}';";
    $result = mysqli_query($connect_db, $query);

    //Deleta o projeto
    $query="DELETE FROM projects WHERE id ='{$id}';";
    $result = mysqli_query($connect_db, $query);

    $_SESSION['deletado_com_sucesso'] = true;
    header("Location: ../projetos.php");
    exit();   
}

if (!isset($_GET['projeto'])) {
} else {
    $id = $_GET['projeto'];

    //Verifica se o ID via GET existe nos projetos
    $query = "SELECT id, title, description, create_time FROM projects WHERE id = '{$id}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se nao existir o ID passado via GET volta para a lista de projetos
    if ($row == 0) {
        header("Location: ../projetos.php");
        exit();
    }

    // Cria variaveis do respectivo projeto
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $title = $row["title"];
    }
    
    //Obtem todo os usuarios
    $query_usuarios = "SELECT * FROM accounts ";
    $resultado = mysqli_query($connect_db, $query_usuarios);

}
