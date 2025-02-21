<?php
// Iniciar sesión si no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../../../includes/conexion.php');

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if (empty($nombre) || empty($descripcion)) {
        $_SESSION['error_ingreso_categoria'] = "Todos los campos deben llenarse correctamente";
        header('Location: ./editar-categoria.php?id=' . $id); 
        exit();
    }

    $sql = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $nombre, $descripcion, $id);
        $guardar = mysqli_stmt_execute($stmt);

        if ($guardar) {
            $_SESSION['exito_categoria'] = "Se actualizó de forma exitosa la categoría.";
            header('Location: ../../../views/admin/admin.publicaciones.php');
            exit();
        } else {
            $_SESSION['error_actualizar_categoria'] = "No se pudo completar la actualización de la categoría.";
            header('Location: ../../../views/admin/admin.publicaciones.php');
            exit();
        }
    } else {
        
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . mysqli_error($db);
        header('Location: ../../../views/admin/admin.publicaciones.php');
        exit();
    }

} else {
    header('Location: ../../../views/admin/admin.publicaciones.php');
        exit();
}
?>