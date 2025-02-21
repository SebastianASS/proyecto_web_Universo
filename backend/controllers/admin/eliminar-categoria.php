<?php
require_once '../../../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idCategoria'];

    $query_consultar = "SELECT * FROM publicaciones WHERE categoria_id = ?";
    $stmt_comprobar = mysqli_prepare($db,$query_consultar);
    mysqli_stmt_bind_param($stmt_comprobar,"i",$id);
    mysqli_stmt_execute($stmt_comprobar);
    $resultadoComprobacion = mysqli_stmt_get_result($stmt_comprobar);

    if(mysqli_num_rows($resultadoComprobacion)>0){
        $_SESSION['mensaje_eliminar']="Existen publicaciones asociadas a esta categoria, no se puede eliminar";
        header('Location: ../../../views/admin/admin.publicaciones.php');
             exit();
    }


    if (is_numeric($id)) {
        $query = "DELETE FROM categorias WHERE id = $id";
        $resultado = mysqli_query($db, $query);
 


        if ($resultado) {
            $_SESSION['mensaje_eliminar']="Categoria eliminada exitosamente";
            header('Location: ../../../views/admin/admin.publicaciones.php');
            exit();
            
        } else {
            $_SESSION['mensaje_eliminar']="Error al eliminar categoria";
        }
    } else {
        $_SESSION['mensaje_eliminar']="ID no valido";
    }
} else {
    $_SESSION['mensaje_eliminar']="No permitido";
}
?>