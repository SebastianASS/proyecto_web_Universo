<?php
$servidor = 'localhost';
$usuario  = 'root';
$password = '';
$basededatos = 'universo';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);


if (!$db) {
    die("Error de conexión: " . mysqli_connect_error());
}


mysqli_query($db, "SET NAMES 'utf8'");


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>