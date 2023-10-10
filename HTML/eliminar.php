<?php
include '../config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Realiza la consulta SQL para eliminar el producto por su ID
        $sql = "DELETE FROM listasuper WHERE ID = $productId";

        if ($conexion->query($sql) === TRUE) {
            // Éxito: El producto se ha eliminado correctamente
            header("Location: list.php"); // Redirige de vuelta a la página de lista de super
            exit();
        } else {
            // Error: No se pudo eliminar el producto
            echo "Error al eliminar el producto: " . $conexion->error;
        }
    }
}

$conexion->close();
?>