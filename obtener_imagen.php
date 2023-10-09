<?php
include 'config/conection.php';

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];

    $sql = "SELECT imagenURL FROM catalogo WHERE nombre = '$nombre'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagenURL = $row['imagenURL'];
        echo json_encode(['success' => true, 'url' => $imagenURL]);
    } else {
        echo json_encode(['success' => false]);
    }
}

$conexion->close();
?>
