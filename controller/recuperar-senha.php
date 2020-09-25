<?php
session_start();
include('../app/database.php');

if (isset($_POST['novasenha'])) {
    if(empty($_POST['novasenha'])) {
        $_SESSION['senha_nao_pode_vazio'] = true;
        header('Location: ../index.php');
    }

    //Check se existe o token para o respectivo id
    $id = $_POST['id'];
    $token = $_POST['token'];
    $password_for_encrypt = $_POST['novasenha'];
    $password = md5($password_for_encrypt);

    $query = "SELECT id, accounts_id, token FROM recuperar_senha WHERE accounts_id = '{$id}' AND token = '{$token}'";
    $result = mysqli_query($connect_db, $query);
    $row = mysqli_num_rows($result);

    //Se o token for invalido
    if ($row == 0) {
        $_SESSION['token_nao_existe'] = true;
        header("Location: ../esqueceu-senha.php");
        exit();
    } else {

    //Se o token for valido
    $query="UPDATE accounts SET password='{$password}' WHERE id='{$id}';";
    $result = mysqli_query($connect_db, $query);

    if ($result == 0) {
        header("Location: ../esqueceu-senha.php");
        exit();
    } else {
        $query="DELETE FROM recuperar_senha WHERE accounts_id = '{$id}' AND token = '{$token}';";
        $result = mysqli_query($connect_db, $query);
        
        $_SESSION['senha_alterada_sucesso'] = true;
        header("Location: ../index.php");
    }    

    }
}

if(empty($_POST['email'])) {
    header('Location: ../esqueceu-senha.php');
}

$email = mysqli_real_escape_string($connect_db, $_POST['email']);

// Checar se existe uma conta vinculada a este email
$query = "SELECT id, username, email FROM accounts WHERE email = '{$email}'";
$result = mysqli_query($connect_db, $query);
$row = mysqli_num_rows($result);

//Se nao existir o email volta para a pagina de esqueceu a senha
if ($row == 0) {
    $_SESSION['email_nao_existe'] = true;
    header("Location: ../esqueceu-senha.php");
    exit();
}

// Obtendo os dados do usuario e distruibuindo as variaveis
// Cria o token para insercao na db
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $username = $row["username"];
    $email = $row["email"];
    $token = sha1(uniqid( mt_rand(), true));
}

// Insercao do token e account_id na db
$query = "INSERT INTO recuperar_senha (accounts_id, token) VALUES ('{$id}', '{$token}');";
$result = mysqli_query($connect_db, $query);

// Enviar os dados para API do PHPMailer para enviar o token por email
$assunto = "Solicitação para alterar sua senha";
include('sendemail.php');

$_SESSION['email_enviado'] = true;
header('Location: ../esqueceu-senha.php');
exit();