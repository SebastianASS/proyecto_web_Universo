<?php
session_start();


require_once '../../../includes/conexion.php';


if (isset($_SESSION['error_login'])) {
    unset($_SESSION['error_login']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);

    if (empty($correo) || empty($contraseña)) {
        $_SESSION['error_login'] = "Todos los campos son obligatorios.";
        header('Location: index.php');
        exit();
    }

             $sql_comprobar_correo = "SELECT * FROM usuarios WHERE correo = ?";
             $stmt_comprobar = mysqli_prepare($db, $sql_comprobar_correo);
             mysqli_stmt_bind_param($stmt_comprobar, "s", $correo);
             mysqli_stmt_execute($stmt_comprobar);
             $resultado = mysqli_stmt_get_result($stmt_comprobar);
         
             if (mysqli_num_rows($resultado) == 0) {
                 $_SESSION['error_login'] = "El correo electrónico no está registrado.";
                 header('Location: ../../../index.php');
                 exit();
             }

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);


        if ($resultado && mysqli_num_rows($resultado) == 1) {
            $usuario = mysqli_fetch_assoc($resultado);


            if (password_verify($contraseña, $usuario['contraseña'])) {
                $_SESSION['usuario'] = $usuario;

                if ($usuario['rol'] == 1) {
                    header('Location: ../../../views/admin/admin.inicio.php');
                } elseif ($usuario['rol'] == 2) {
                    header('Location: ../../../views/user/user.inicio.php');
                } else {
                    $_SESSION['error_login'] = "Acceso denegado. Rol no válido.";
                    header('Location: index.php');
                }
                exit();
            } else {
                $_SESSION['error_login'] = "Contraseña incorrecta.";
                header('Location: ../../../index.php');
                exit();
            }
        } else {
            $_SESSION['error_login'] = "El usuario no existe.";
            header('Location: ../../../index.php');
            exit();
        }
    } else {
        $_SESSION['error_login'] = "Error en la base de datos. Inténtalo de nuevo.";
        header('Location: ../../../index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>