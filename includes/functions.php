<?php

function conseguirCategorias($conexion) {
    $sql = "SELECT * FROM categorias;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
       
        while ($fila = mysqli_fetch_assoc($categorias)) {
            $resultado[] = $fila;
        }
    }
    return $resultado; 
}

function conseguirPublicaciones($conexion) {
    $sql = "SELECT p.*, c.nombre AS nombre_categoria 
        FROM publicaciones p
        INNER JOIN categorias c ON p.categoria_id = c.id
        ORDER BY p.id ASC";
    $publicaciones = mysqli_query($conexion, $sql);
    $resultado = array(); 

    if ($publicaciones && mysqli_num_rows($publicaciones) >= 1) {
        
        while ($fila = mysqli_fetch_assoc($publicaciones)) {
            $resultado[] = $fila;
        }
    }

    return $resultado; 
}

function conseguirRol($conexion){
    $sql = "SELECT * FROM rol";
    $roles = mysqli_query($conexion,$sql);
    $resultado=array();

    if ($roles && mysqli_num_rows($roles)>=1) {
        while($fila = mysqli_fetch_assoc($roles)){
           $resultado[] = $fila;
        }
    }
     return $resultado;
}


function conseguirUsuarios($conexion) {
 
    $sql = " SELECT usuarios.*, rol.descripcion AS nombre_rol FROM  usuarios LEFT JOIN rol ON usuarios.rol = rol.id";
    

    $usuarios = mysqli_query($conexion, $sql);
    $resultado = array();


    if ($usuarios && mysqli_num_rows($usuarios) >= 1) {
        while ($fila = mysqli_fetch_assoc($usuarios)) {
            $resultado[] = $fila;
        }
    }

    return $resultado;
}


function conseguirPublicacionesGeneral($conexion){
    $sql= "SELECT * from publicaciones;";
    $publicaciones = mysqli_query($conexion,$sql);
    $resultado = array();

    if ($publicaciones && mysqli_num_rows($publicaciones) >= 1) {
        while ($fila = mysqli_fetch_assoc($publicaciones)) {
            $resultado[] = $fila;
        }
    }
    return $resultado;
}


function conseguirComentarios($conexion, $id_publicacion) {
    $sql = "SELECT 
        u.nombre,
        u.apellidoUno,
        c.descripcion AS comentario
    FROM 
        comentarios c
    INNER JOIN 
        usuarios u ON c.id_usuario = u.id
    WHERE 
        c.id_publicacion = $id_publicacion";

    $comentarios = mysqli_query($conexion, $sql);
    $resultado = array();

    if ($comentarios && mysqli_num_rows($comentarios) >= 1) {
        while ($fila = mysqli_fetch_assoc($comentarios)) {
            $resultado[] = $fila;
        }
    }
    return $resultado;
}

function conseguirPublicacionesPorCategoria($db, $categoria_id) {
    $sql = "SELECT * FROM publicaciones WHERE categoria_id = $categoria_id";
    $query = mysqli_query($db, $sql);
    $publicaciones = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $publicaciones;
}

function buscarPublicaciones($db, $query) {

    $query = mysqli_real_escape_string($db, $query); 
    $sql = "SELECT * FROM publicaciones 
            WHERE titulo LIKE '%$query%' OR descripcion LIKE '%$query%'";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die(json_encode(['error' => 'Error en la consulta: ' . mysqli_error($db)])); 
    }

    $publicaciones = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    return $publicaciones; 
}


?>