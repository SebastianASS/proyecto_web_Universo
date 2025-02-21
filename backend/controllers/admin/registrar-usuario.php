<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        require_once '../../../includes/conexion.php';
        $nombre = trim($_POST['nombre']);         
        $apellidoUno = trim($_POST['apellidoUno']);
        $apellidoDos = trim($_POST['apellidoDos']);
        $edad = $_POST['edad'];                  
        $correo = trim($_POST['correo']);          
        $contraseña = trim($_POST['contraseña']); 
        $rol = trim($_POST['rol']);   

        if(empty($nombre) || empty($apellidoUno) || empty($apellidoDos) || empty($edad) || empty($correo) || empty($contraseña) || empty($rol)){
            $_SESSION['error_registro'] = "Todos los campos obligatorios deben estar completos.";
            header('Location: ../../../views/admin.usuarios.php');
            exit();
        }


         $sql_comprobar_correo = "SELECT * FROM usuarios WHERE correo = ?";
         $stmt_comprobar = mysqli_prepare($db, $sql_comprobar_correo);
         mysqli_stmt_bind_param($stmt_comprobar, "s", $correo);
         mysqli_stmt_execute($stmt_comprobar);
         $resultado = mysqli_stmt_get_result($stmt_comprobar);
     
         if (mysqli_num_rows($resultado) > 0) {
             $_SESSION['error_registro'] = "El correo electrónico ya está registrado.";
             header('Location: ../../../views/admin/admin.usuarios.php');
             exit();
         }


        $contraseñaEncriptada = password_hash($contraseña,PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nombre,apellidoUno,apellidoDos,edad,correo,contraseña,rol) VALUES(?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($db,$sql);

        if($stmt){
            mysqli_stmt_bind_param($stmt, 'sssissi',$nombre,$apellidoUno,$apellidoDos,$edad,$correo,$contraseñaEncriptada,$rol);
       
        $guardar = mysqli_stmt_execute($stmt);


        if ($guardar) {
            $_SESSION['registro_exitoso'] = "Registro completado.";
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        } else {
            $_SESSION['error_registro'] = "Error al registrar el usuario: " . mysqli_error($db);
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        }

        }else{
            $_SESSION['error_registro'] = "Error al preparar la consulta: " . mysqli_error($db);
            header('Location: ../../../views/admin/admin.usuarios.php');
            exit();
        }

    }else {
        header('Location: ../../../views/admin/admin.usuarios.php');
        exit();
    }

?>