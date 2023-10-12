<?php
include '../config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el ID del producto a eliminar desde el formulario
    $product_id = $_POST['product_id'];

    // Realiza la consulta SQL para eliminar el producto del catálogo
    $sql = "DELETE FROM catalogo WHERE ID = $product_id";

    if ($conexion->query($sql) === TRUE) {
        // Éxito: El producto se ha eliminado correctamente
        header("Location: catalog.php"); // Redirige de vuelta a la página del catálogo
        exit();
    } else {
        // Error: No se pudo eliminar el producto
        echo "Error al eliminar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>