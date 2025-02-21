<?php
require_once '../../includes/conexion.php'; 
require_once '../../includes/functions.php'; 

header('Content-Type: application/json');

if (isset($_GET['searchQuery'])) {
    $searchQuery = trim($_GET['searchQuery']); 
    if (!empty($searchQuery)) {
        $publicaciones = buscarPublicaciones($db, $searchQuery); 
        echo json_encode($publicaciones); 
    } else {
        echo json_encode([]); 
    }
} else {
    echo json_encode([]); 
}


?>