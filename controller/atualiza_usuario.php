<?php
date_default_timezone_set('Europe/Lisbon');

$id = $_POST['id'];

session_start();
include('../app/database.php');

if(empty($_POST['username']) || empty($_POST['email'])) {
    header("Location: ../usuario.php?usuario=$id");
}

//Cria as variaveis globais
$username = mysqli_real_escape_string($connect_db, $_POST['username']);
$email = mysqli_real_escape_string($connect_db, $_POST['email']);
$enabled = mysqli_real_escape_string($connect_db, $_POST['enabled']);
$update_time = date('Y-m-d H:i:s', time());


//Valida se o novo email ou o usuario ja exite na base de dados
$query = "SELECT id, username, email FROM accounts WHERE username = '{$username}' OR email = '{$email}';";
$result = mysqli_query($connect_db, $query);
$row = mysqli_num_rows($result);


// Upload da imagem
if (!empty($_FILES["imagem"]["tmp_name"])) {
    $tokenimg = sha1(uniqid( mt_rand(), true));

    $_FILES["imagem"]["name"] = $tokenimg . basename($_FILES["imagem"]["name"]);

    
    $diretorio = "../uploads/users/";
    $caminho_imagem = $diretorio . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $extensaoImagem = strtolower(pathinfo($caminho_imagem,PATHINFO_EXTENSION));

    // Check se e uma imagem
    if($extensaoImagem != "jpg" && $extensaoImagem != "png" && $extensaoImagem != "jpeg"
    && $extensaoImagem != "gif" ) {
        $_SESSION['extensao_imagem_invalida'] = true;
        $uploadOk = 0;
    }

    // Check a imagem e verifica se nao ha erros e move o tmp
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_imagem)) {
        } else {
        }
    }
}

$profile = $_FILES["imagem"]["name"];

//Valida se o novo usuario/email do input ja existe na base dados
if ($row == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($id == $row["id"]) {
        } else {
            $_SESSION['ja_existe_um_usuario_atualiza'] = true;
            header("Location: ../usuario.php?usuario=$id");
            exit();
        }
    }
}

if (empty($_POST['password'])) {
    // Se a senha estiver em branco processa o pedido de atualizacao
    $query = "UPDATE accounts 
    SET username = '{$username}', email = '{$email}', enabled = '{$enabled}', profile = '{$profile}', update_time = '{$update_time}' 
    WHERE id='{$id}';";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    $_SESSION['usuario_atualizado_sucesso'] = true;
    header("Location: ../usuario.php?usuario=$id");
    exit();
} else {
    // Se o input da senha tiver valor processa o pedido de atualizacao
    $password_for_encrypt = mysqli_real_escape_string($connect_db, $_POST['password']);
    $password = md5($password_for_encrypt);

    $query = "UPDATE accounts 
    SET username = '{$username}', email = '{$email}', enabled = '{$enabled}', profile = '{$profile}', update_time = '{$update_time}', password = '{$password}'
    WHERE id='{$id}';";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    $_SESSION['usuario_atualizado_sucesso'] = true;
    header("Location: ../usuario.php?usuario=$id");
    exit();
}

