<?php
include 'config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $imagenURL = $_POST['imagenURL'];

    // Realiza la consulta SQL para insertar el producto en el catálogo
    $sql = "INSERT INTO catalogo (nombre, imagenURL) VALUES ('$nombre', '$imagenURL')";

    if ($conexion->query($sql) === TRUE) {
        // Éxito: El producto se ha agregado correctamente
        header("Location: HTML/catalog.php"); // Redirige de vuelta a la página del catálogo
        exit();
    } else {
        // Error: No se pudo agregar el producto
        echo "Error al agregar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>
