<?php
date_default_timezone_set('Europe/Lisbon');

session_start();
include('../app/database.php');

if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['dados_vazios'] = true;
    header("Location: ../novo-usuario.php");
}

//Cria as variaveis globais
$username = mysqli_real_escape_string($connect_db, $_POST['username']);
$email = mysqli_real_escape_string($connect_db, $_POST['email']);
$enabled = mysqli_real_escape_string($connect_db, $_POST['enabled']);
$create_time = date('Y-m-d H:i:s', time());
$password_for_encrypt = mysqli_real_escape_string($connect_db, $_POST['password']);
$password = md5($password_for_encrypt);


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

//Valida se o email/usuario existe na base de dados
if ($row == 1) {
    $_SESSION['exite_valor'] = true;
    header("Location: ../novo-usuario.php");
    exit();
}

//Se nao tiver registro faz a inserção
$query="INSERT INTO accounts (username, email, password, enabled, profile, create_time) 
VALUES ('{$username}', '{$email}', '{$password}', '{$enabled}', '{$profile}','{$create_time}');";
$result = mysqli_query($connect_db, $query);

//If/else do registro
if ($result == 1) {
    $_SESSION['perfil_criado'] = true;
    header('Location: ../novo-usuario.php');
    exit();
} else {
    echo "Oops ocorreu um erro: " . $sql . "<br>" . mysqli_error($conn);
    exit();
}
