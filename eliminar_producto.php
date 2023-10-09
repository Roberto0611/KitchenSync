<?php
include 'config/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];

    // Verifica la cantidad actual del producto
    $sql_check_quantity = "SELECT cantidad FROM inventario WHERE ID = $producto_id";
    $result_check_quantity = $conexion->query($sql_check_quantity);

    if ($result_check_quantity->num_rows > 0) {
        $row = $result_check_quantity->fetch_assoc();
        $current_quantity = $row['cantidad'];

        if ($current_quantity == 1) {
            // Si la cantidad actual es 1, elimina el producto en lugar de disminuir la cantidad
            $sql_delete_product = "DELETE FROM inventario WHERE ID = $producto_id";

            if ($conexion->query($sql_delete_product) === TRUE) {
                // Éxito: El producto se ha eliminado correctamente
                echo json_encode(['success' => true]);
            } else {
                // Error: No se pudo eliminar el producto
                echo json_encode(['success' => false, 'error' => $conexion->error]);
            }
        } else {
            // Reducción normal de la cantidad
            $sql_reduce_quantity = "UPDATE inventario SET cantidad = cantidad - 1 WHERE ID = $producto_id";

            if ($conexion->query($sql_reduce_quantity) === TRUE) {
                // Éxito: La cantidad se ha disminuido correctamente
                echo json_encode(['success' => true]);
            } else {
                // Error: No se pudo disminuir la cantidad
                echo json_encode(['success' => false, 'error' => $conexion->error]);
            }
        }
    } else {
        // No se pudo encontrar la cantidad del producto
        echo json_encode(['success' => false, 'error' => 'No se pudo encontrar la cantidad del producto.']);
    }

    $conexion->close();
}
?>