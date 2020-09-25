<?php
session_start();

//Destroy a sessao baseado no ID
unset($_SESSION['id']);
$_SESSION['logout_sucesso'] = true;

header('Location: index.php');