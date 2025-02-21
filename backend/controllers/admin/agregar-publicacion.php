<?php

     if(!isset($_SESSION)){
        session_start();
     }

     if($_SERVER['REQUEST_METHOD']=='POST'){
        require_once '../../../includes/conexion.php';
        $titulo = trim($_POST['titulo']);
        $imagen = trim($_POST['imagen_ruta']);
        $descripcion = ($_POST['descripcion']);
        $categoria = ($_POST['categoria_id']);
     

      if(empty($titulo) || empty($imagen) || empty($descripcion) || empty($categoria)){
         $_SESSION['error_registro_publicacion'] = "Todos los campos deben llenarse correctamente";
         header('Location: ../../../views/admin/admin.publicaciones.php');
         exit();
      }

      $sql = "INSERT INTO publicaciones(titulo,imagen_ruta,descripcion,fecha,categoria_id) VALUES(?,?,?,CURDATE(),?)";
      $stmt = mysqli_prepare($db,$sql);

      if($stmt){
         mysqli_stmt_bind_param($stmt, "sssi", $titulo, $imagen, $descripcion, $categoria);
 
         $guardar = mysqli_stmt_execute($stmt);
 
         if($guardar){
             $_SESSION['error_registro_publicacion']="Se registró de forma exitosa la publicacion";
             header('Location: ../../../views/admin/admin.publicaciones.php');
         exit();
             
         }else{
             $_SESSION['error_registro_publicacion']="No se se pudo completar el registro de la publicacion";
 
         }
     }else {
      
         $_SESSION['error_registro_publicacion'] = "Error al preparar la consulta: " . mysqli_error($db);
         exit();
     }      


   }else {
       
        header('Location: ../../../views/admin/admin.publicaciones.php');
        exit();
    }

?>