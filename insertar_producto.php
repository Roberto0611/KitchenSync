<?php
include 'config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST['nombreProducto'];
    $fechaCaducidad = $_POST['fechaCaducidad'];
    $cantidad = $_POST['cantidad'];
    $ubicacion = $_POST['ubicacion'];
    $imagenURL = $_POST['imagenURL'];
    
    // Obtén la fecha actual en formato YYYY-MM-DD
    $fechaIngreso = date("Y-m-d");

    // Realiza la consulta SQL para insertar el producto, incluyendo la fecha de ingreso
    $sql = "INSERT INTO inventario (nombre, caducidad, cantidad, ubicacion, imagenURL, ingreso) VALUES ('$nombreProducto', '$fechaCaducidad', '$cantidad', '$ubicacion', '$imagenURL', '$fechaIngreso')";

    if ($conexion->query($sql) === TRUE) {
        // Éxito: El producto se ha agregado correctamente
        header("Location: index.php");
        exit();
    } else {
        // Error: No se pudo agregar el producto
        echo "Error al agregar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>