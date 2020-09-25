<?php

$DBHost = "127.0.0.1";
$DBUser = "root";
$DBPass = "";
$DBName = "cyberproject";

$connect_db = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);
if (!$connect_db) {
    die('Erro de conexão: ' . mysqli_connect_error());
}