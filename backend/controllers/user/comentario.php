<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        require_once('../../../includes/conexion.php');
        $id_publicacion = $_POST['id_publicacion'];
        $id_usuario = $_POST['id_usuario'];
        $comentario = $_POST['comentario'];
    echo "id_publicacion: $id_publicacion<br>";
    echo "id_usuario: $id_usuario<br>";
    echo "comentario: $comentario<br>";

    if(empty($id_publicacion) || empty($id_comentario) || empty($comentario)){
        $_SESSION['error_ingreso_categoria'] = "Todos los campos deben llenarse correctamente";
    }

    $sql = "INSERT INTO comentarios(descripcion,id_usuario,id_publicacion) VALUES(?,?,?)";
    $stmt = mysqli_prepare($db,$sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt,"sii",$comentario,$id_usuario,$id_publicacion);

        $guardar = mysqli_stmt_execute($stmt);

        if($guardar){
            $_SESSION['Se registro exitosamente']="Se registró de forma exitosa el comentario";
            header('Location: ../../../views/user/user.inicio.php');
        exit();
            
        }else{
            $_SESSION['Error al guarda']="No se se pudo completar el registro de la categoria";
            header('Location: ../../../views/user/user.inicio.php');
            header('Location: ../../../views/user/user.inicio.php');
            exit();
        }
    }else {
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . mysqli_error($db);
        header('Location: ../../../views/user/user.inicio.php');
        exit();
    }

    }else {
        header('Location: ./views/user/user.inicio.php');
        exit();
    }

?>