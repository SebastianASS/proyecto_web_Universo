<?php
require_once '../../../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idPublicacion'];

    if (is_numeric($id)) {
        $query = "DELETE FROM publicaciones WHERE id = $id";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo "Publicación eliminada correctamente.";
            header('Location: ../../../views/admin/admin.publicaciones.php');
            exit();
        } else {
            echo "Error al eliminar la publicación: " . mysqli_error($db);
        }
    } else {
        echo "ID de publicación no válido.";
    }
} else {
    echo "Método no permitido.";
}
?>