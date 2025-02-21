<?php
require_once '../../../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $imagen_ruta = $_POST['imagen_ruta'];
    $categoria_id = $_POST['categoria_idP'];

    // Verificar que el categoria_id no esté vacío
    if (empty($categoria_id)) {
        die("Error: El ID de la categoría no puede estar vacío.");
    }

    // Escapar el valor de categoria_id para evitar inyecciones SQL
    $categoria_id = mysqli_real_escape_string($db, $categoria_id);

    // Verificar si el categoria_id existe en la tabla categorias
    $query_verificar = "SELECT id FROM categorias WHERE id = '$categoria_id'";
    $resultado_verificar = mysqli_query($db, $query_verificar);

    if (!$resultado_verificar) {
        die("Error en la consulta: " . mysqli_error($db));
    }

    if (mysqli_num_rows($resultado_verificar) > 0) {
        $query = "UPDATE publicaciones SET 
                  titulo = '$titulo', 
                  descripcion = '$descripcion', 
                  fecha = '$fecha', 
                  imagen_ruta = '$imagen_ruta', 
                  categoria_id = '$categoria_id' 
                  WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            $_SESSION['mensaje_editar_publicacion'] = "Cambios realizados";
            header('Location: ../../../views/admin/admin.publicaciones.php');
        } else {
            $_SESSION['mensaje_editar_publicacion'] = "Error al realizar los cambios";
            header('Location: ../../../views/admin/admin.publicaciones.php');
        }
    } else {
        $_SESSION['mensaje_editar_publicacion'] = "Error al realizar los cambios";
        header('Location: ../../../views/admin/admin.publicaciones.php');
    }
}
?>
