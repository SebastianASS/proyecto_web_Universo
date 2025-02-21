<?php
require_once '../../includes/conexion.php'; 
require_once '../../includes/functions.php';

$sql = "SELECT * FROM publicaciones";
$stmt = $db->prepare($sql);
$stmt->execute();
$publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($publicaciones);
?>