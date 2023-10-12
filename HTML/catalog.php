<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../IMG/icon.png"/>
    <title>KitchenSync - Catalogo</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Inventario</a></li>
                <li><a href="list.php">Lista de Super</a></li>
            </ul>
        </nav>
    </header>
    <div class="catalog-header">
        <h2>Catalogo</h2>
        <p>Control de productos en el catálogo</p>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Buscar productos...">
    </div>
    <div class="product-container">
        <table class="product-list" width="100%" cellspacing="0">
        <?php
include '../config/conection.php';

$sql = "SELECT * FROM catalogo"; 
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo "<div class='product-item'>";
        echo "<div class='product-info'>";
        echo "<table style='width: 100%;'>";
        echo "<tr>";
        echo "<td style='vertical-align: middle;'>";
        echo "<img src='" . $row['imagenURL'] . "' alt='" . $row['nombre'] . "'>";
        echo "</td>";
        echo "<td style='vertical-align: middle;'>";
        echo "<div class='product-text'>";
        echo "<h3>" . $row['nombre'] . "</h3>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "<form method='post' action='eliminarC.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row['ID'] . "'>";
        echo "<button type='submit' class='delete-button' data-productid='" . $row['ID'] . "'>-</button>";
        echo "</form>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No hay productos en el catálogo.</td></tr>";
}

$conexion->close(); 
?>
        </table>
    </div>
    <!-- MODAL Y SU BOTÓN -->
    <button class="open-modal" data-open="modal1">+</button>
    <div class="modal" id="modal1">
        <div class="modal-dialog">
            <header class="modal-header">
                <p class="Modal-Header">Agregar productos al inventario</p>
                <button class="close-modal" aria-label="close modal" data-close>✕</button>
            </header>
            <section class="modal-content">
                <form id="product-form" method="POST" action="../agregar_catalogo.php">
                    <label for="nombreProducto">Nombre del producto:</label>
                    <input type="text" id="nombreProducto" name="nombre" required>
                    <label for="imagenURL">URL de la imagen:</label>
                    <input type="text" id="imagenURL" name="imagenURL">
                    <button type="submit">Agregar</button>
                </form>
            </section>
        </div>
    </div>
    <script src="../JS/modal.js"></script>
</body>
</html>
