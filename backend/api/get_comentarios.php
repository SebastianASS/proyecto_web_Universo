<?php

require_once '../../includes/conexion.php'; 
require_once '../../includes/functions.php'; 


if (isset($_GET['id_publicacion'])) {
    $id_publicacion = $_GET['id_publicacion'];
    $comentarios = conseguirComentarios($db, $id_publicacion); 
    echo json_encode($comentarios); 
} else {
    echo json_encode([]); 
}
?>