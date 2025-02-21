<?php
session_start(); 
require_once '../../../includes/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);
    $apellidoUno = trim($_POST['apellidoUno']);
    $apellidoDos = trim($_POST['apellidoDos']);
    $edad = intval($_POST['edad']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);


    if (empty($nombre) || empty($apellidoUno) || empty($apellidoDos) || empty($edad) || empty($correo)) {
        $_SESSION['error'] = "Todos los campos son obligatorios, excepto la contraseña.";
        header('Location: ../../../views/user/user.usuario.php');
        exit();
    }


    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "El correo electrónico no tiene un formato válido.";
        header('Location: ../../../views/user/user.usuario.php');
        exit();
    }


    if ($edad <= 0) {
        $_SESSION['error'] = "La edad debe ser un número positivo.";
        header('Location: ../../../views/user/user.usuario.php');
        exit();
    }


    if (!empty($contraseña)) {
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET 
                nombre = ?, 
                apellidoUno = ?, 
                apellidoDos = ?, 
                edad = ?, 
                correo = ?, 
                contraseña = ?
                WHERE id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sssissi", $nombre, $apellidoUno, $apellidoDos, $edad, $correo, $contraseña_encriptada, $id);
    } else {
        $sql = "UPDATE usuarios SET 
                nombre = ?, 
                apellidoUno = ?, 
                apellidoDos = ?, 
                edad = ?, 
                correo = ?
                WHERE id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sssisi", $nombre, $apellidoUno, $apellidoDos, $edad, $correo, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellidoUno'] = $apellidoUno;
        $_SESSION['usuario']['apellidoDos'] = $apellidoDos;
        $_SESSION['usuario']['edad'] = $edad;
        $_SESSION['usuario']['correo'] = $correo;
        $_SESSION['success'] = "Perfil actualizado correctamente.";
        header('Location: ../../../views/user/user.usuario.php');
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar el perfil.";
        header('Location: ../../../views/user/user.usuario.php');
        exit();
    }
} else {
    header('Location: ../../../views/user/user.usuario.php');
    exit();
}
?>