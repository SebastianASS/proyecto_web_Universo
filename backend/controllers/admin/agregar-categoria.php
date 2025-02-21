<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        require_once('../../../includes/conexion.php');
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
    

    if(empty($nombre) || empty($descripcion)){
        $_SESSION['error_ingreso_categoria'] = "Todos los campos deben llenarse correctamente";
    }

    $sql = "INSERT INTO categorias(nombre,descripcion) VALUES(?,?)";
    $stmt = mysqli_prepare($db,$sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt,"ss",$nombre,$descripcion);

        $guardar = mysqli_stmt_execute($stmt);

        if($guardar){
            $_SESSION['Se registro exitosamente']="Se registró de forma exitosa la categoria";
            header('Location: ../../../views/admin/admin.publicaciones.php');
        exit();
            
        }else{
            $_SESSION['Error al guarda']="No se se pudo completar el registro de la categoria";

        }
    }else {
      
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . mysqli_error($db);
        exit();
    }

    }else {
        header('Location: ../../../views/admin/admin.publicacines.php');
        exit();
    }

?>