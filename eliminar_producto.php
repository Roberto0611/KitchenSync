<?php
include 'config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];

    // Realiza la consulta SQL para eliminar el producto
    $sql = "DELETE FROM inventario WHERE ID = $producto_id";

    if ($conexion->query($sql) === TRUE) {
        // Éxito: El producto se ha eliminado correctamente
        echo json_encode(['success' => true]);
    } else {
        // Error: No se pudo eliminar el producto
        echo json_encode(['success' => false, 'error' => $conexion->error]);
    }

    $conexion->close();
}
?>