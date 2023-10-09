<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" type="image/png" href="IMG/icon.png"/>
    <title>KitchenSync - Inventario</title>
</head>

<script>
    function confirmDelete(producto_id) {
    const confirmation = confirm('¿Estás seguro de que deseas eliminar un producto?');

    if (confirmation) {
        // Si el usuario acepta la confirmación, realiza la eliminación
        const formData = new FormData();
        formData.append('producto_id', producto_id);

        fetch('eliminar_producto.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Eliminación exitosa, recarga la página para ver la cantidad actualizada
                window.location.reload();
            } else {
                alert('Error al eliminar el producto: ' + data.error);
            }
        })
        .catch(error => {
            alert('Error al eliminar el producto: ' + error.message);
        });
    }
}
</script>

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
        <h2>Inventario📦</h2>
        <p>Control de productos en la cocina</p>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Buscar productos...">
        <button>Buscar</button>
    </div>
    <div class="product-container">
        <table class="product-list" width="100%" cellspacing="0">
            <!----------PHP---------->
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
                    echo "<button class='delete-button custom-delete-button' onclick='confirmDelete(" . $row['ID'] . ")'>-</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay productos en el inventario, puedes agregarlos desde el botón azul '+'.</td></tr>";
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
            <form id="product-form" action="insertar_producto.php" method="POST">
            <label for="nombreProducto">Nombre del producto:</label>
            <select id="nombreProducto" class="CampoModal" name="nombreProducto" required>
            <option value="" disabled selected>Selecciona un producto</option>
                <?php
                include 'config/conection.php';
                
                $sql = "SELECT nombre FROM catalogo";
                $result = $conexion->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                    }
                }
                
                $conexion->close();
                ?>
            </select>

            <label for="imagenURL">URL de la imagen:</label>
            <input type="text" id="imagenURL" name="imagenURL" required readonly>

            <label for="fechaCaducidad">Fecha de caducidad:</label>
            <input type="date" id="fechaCaducidad" name="fechaCaducidad" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required min="1">

            <label for="ubicacion">Ubicación:</label>
            <select id="ubicacion"  class="CampoModal" name="ubicacion" required>
                <option value="Refrigerador">Refrigerador</option>
                <option value="Alacena">Alacena</option>
                <option value="Otro">Otro</option>
            </select>

                <!-- Agregar aquí los campos adicionales que necesites -->

                <button type="submit" class="modalButton">Agregar</button>
            </form>
</section>
        </div>
      </div>

    <!--Scripts--->
    <script src="JS/imgurl.js"></script>
    <script src="JS/modal.js"></script>
</body>
</html>
