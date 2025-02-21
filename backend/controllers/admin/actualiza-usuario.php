<?php
require_once '../../../includes/conexion.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoUno = $_POST['apellidoUno'];
    $apellidoDos = $_POST['apellidoDos'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];


    if (empty($nombre) || empty($apellidoUno)  || empty($apellidoDos) || empty($correo) || empty($edad) || empty($rol)) {
        $_SESSION['error_actualizar'] = 'Todos los campos obligatorios deben ser completados.';
        header('Location: ../../../views/admin/admin.usuarios.php');
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
                contraseña = ?, 
                rol = ? 
                WHERE id = ?";

      
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssi", $nombre, $apellidoUno, $apellidoDos, $edad, $correo, $contraseña_encriptada, $rol, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['exito_actualizar'] = 'Usuario actualizado correctamente.';
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        } else {
            $_SESSION['error_actualizar'] = 'Error al actualizar el usuario.';
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        }
    } else {
       
        $sql = "UPDATE usuarios SET 
                nombre = ?, 
                apellidoUno = ?, 
                apellidoDos = ?, 
                edad = ?, 
                correo = ?, 
                rol = ? 
                WHERE id = ?";

 
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssi", $nombre, $apellidoUno, $apellidoDos, $edad, $correo, $rol, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['exito_actualizar'] = 'Usuario actualizado correctamente.';
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        } else {
            $_SESSION['error_actualizar'] = 'Error al actualizar el usuario.';
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        }
    }
} else {
   
    header('Location: ../../../views/admin/admin.usuarios.php');
}
?>
