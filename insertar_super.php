<?php
include 'config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST['nombreProducto'];
    $cantidad = $_POST['cantidad'];
    $prioridad = $_POST['prioridad'];
    $imagenURL = $_POST['imagenURL']; // Asegúrate de que se esté recibiendo correctamente

    $fechaIngreso = date("Y-m-d");

    $sql = "INSERT INTO listasuper (nombre, cantidad, prioridad, ingreso, imagenURL) VALUES ('$nombreProducto', '$cantidad', '$prioridad', '$fechaIngreso', '$imagenURL')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: HTML/list.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }
}

$conexion->close();
//php finish
?>