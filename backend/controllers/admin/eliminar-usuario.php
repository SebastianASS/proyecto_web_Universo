<?php
require_once '../../../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idUsuario'];
    echo "El id traido es: ".$id;

    if (is_numeric($id)) {
        $query = "DELETE FROM usuarios WHERE id = $id";
        $resultado = mysqli_query($db, $query);
 


        if ($resultado) {
            echo "Categoría eliminada correctamente.";
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
            
        } else {
            echo "Error al eliminar la categoría.";
        }
    } else {
        echo "ID de categoría no válido.";
    }
} else {
    echo "Método no permitido.";
}
?>