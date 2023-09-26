<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" type="image/png" href="IMG/icon.png"/>
    <title>KitchenSync - Inventario</title>
</head>
<body>
    
<header>
        <nav>
            <ul>
                <li><a href="index.php">Inventario</a></li>
                <li><a href="HTML/list.html">Lista de Super</a></li>
            </ul>
        </nav>
    </header>
    <div class="inventory-header">
        <h2>Inventario</h2>
        <p>Control de productos en la cocina</p>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Buscar productos...">
        <button>Buscar</button>
    </div>
    <div class="product-container">
        <table class="product-list" width="100%" cellspacing="0">
            <?php
            include 'config/conection.php';

            $sql = "SELECT * FROM inventario";
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
                    echo "<p><strong>Caducidad:</strong> " . $row['caducidad'] . "<br><strong>Cantidad:</strong> " . $row['cantidad'] . "<br><strong>Ingreso:</strong> " . $row['ingreso'] . "<br><strong>Ubicación:</strong> " . $row['ubicacion'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</div>";
                    echo "<button class='delete-button'>-</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay productos en el inventario.</td></tr>";
            }

            $conexion->close();
            ?>
        </table>
    </div>

    <!----------MODAL Y SU BOTON---------->
    <button class="open-modal" data-open="modal1" >+</button>

    <div class="modal" id="modal1">
        <div class="modal-dialog">
          <header class="modal-header">
            <p class="Modal-Header"> Agregar productos al inventario    </p>
            <button class="close-modal" aria-label="close modal" data-close>✕</button>
          </header>
          <section class="modal-content">

            <form id="product-form">
                <label for="nombreProducto">Nombre del producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" required>
                
                <label for="fechaCaducidad">Fecha de caducidad:</label>
                <input type="date" id="fechaCaducidad" name="fechaCaducidad" required>
                
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>
                
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" required>
                
                <button type="submit">Agregar</button>
            </form>

          </section>
        </div>
      </div>

    <script src="JS/modal.js"></script>
</body>
</html>