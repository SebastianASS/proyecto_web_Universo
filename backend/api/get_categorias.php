<?php
require_once '../../includes/conexion.php';
require_once '../../includes/functions.php';

if (isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];
    $publicaciones = conseguirPublicacionesPorCategoria($db, $categoria_id);
    echo json_encode($publicaciones);
} else {
    echo json_encode([]);
}
?>