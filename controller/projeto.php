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

if (!isset($_GET['desvinculausuario'])) {
} else {
    if (empty($_GET['idProjeto'])) {
        header("Location: ../projetos.php");
        exit();
    }

    //Variaveis
    $id_usuario = $_GET['desvinculausuario'];
    $id_projeto = $_GET['idProjeto'];

    //Verifica se o usuario existe na base de dados
    $query = "SELECT * FROM accounts WHERE id = '{$id_usuario}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se nao existir o ID passado via GET volta para a lista de usuarios
    if ($row == 0) {
        header("Location: ../projetos.php");
        exit();
    }

    //Deleta o respectivo usuario
    $query="DELETE FROM accounts_projects WHERE accounts_id = '{$id_usuario}' AND projects_id = '{$id_projeto}'";
    $result = mysqli_query($connect_db, $query);

    $_SESSION['deletado_com_sucesso'] = true;
    header("Location: ../projeto.php?projeto=$id_projeto");
    exit();   
}

if (!isset($_GET['projeto'])) {
} else {
    $id = $_GET['projeto'];

    //Obtem dados de todos os usuarios vinculado a este projeto
    $query_projeto = "SELECT * FROM accounts_projects WHERE projects_id = '{$id}'; ";
    $resultado = mysqli_query($connect_db, $query_projeto);

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
        $description = $row["description"];
        $create_time = $row["create_time"];
    }

    

}
