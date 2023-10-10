<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../IMG/icon.png"/>
    <title>KitchenSync - L.Súper</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Inventario</a></li>
                <li><a href="list.php">Mi lista de Súper🧺</a></li>
            </ul>
        </nav>
    </header>
    <div class="list-header">
        <h2>Mi lista del súper🧺</h2>
        <p>Añade productos a la lista de compras</p>
    </div>
    <div class="super-bar">
        <input type="text" placeholder="Buscar productos...">
        <button id="catalogButton">Catalogo</button>
    </div>
    <div class="product-container">
    <table class="product-list" width="100%" cellspacing="0">
        <?php
        include '../config/conection.php';

        $sql = "SELECT * FROM listasuper";
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
                echo "<p><strong>Cantidad:</strong> " . $row['cantidad'] . "</p>";
                echo "<p><strong>Prioridad:</strong> " . $row['prioridad'] . "</p>"; // Agrega la prioridad
                echo "<p><strong>Fecha de Ingreso:</strong> " . $row['ingreso'] . "</p>"; // Agrega la fecha de ingreso
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
                echo "<button class='delete-button' onclick='confirmDelete(" . $row['ID'] . ")'>-</button>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay productos en la lista de super, puedes agregarlos desde el botón '+'.</td></tr>";
        }        

        $conexion->close();
        ?>
    </table>
</div>

    <!----------MODAL Y SU BOTON---------->
    <button class="open-modal" data-open="modal1">+</button>

<div class="modal" id="modal1">
    <div class="modal-dialog">
        <header class="modal-header">
            <p class="Modal-Header">Agregar productos a la lista de super</p>
            <button class="close-modal" aria-label="close modal" data-close>✕</button>
        </header>
        <section class="modal-content">
        <form id="product-form" method="POST" action="../insertar_super.php">
    <label for="nombreProducto">Nombre del producto:</label>
    <select id="nombreProducto" class="CampoModal" name="nombreProducto" required>
    <option value="" disabled selected>Selecciona un producto</option>
    <?php
    include '../config/conection.php';
    
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
    <input type="text" id="imagenURL" name="imagenURL" readonly>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" required>

    <label for="prioridad" >Prioridad:</label>
    <select id="prioridad" class="CampoModal" name="prioridad">
        <option value="alta">Alta</option>
        <option value="media">Media</option>
        <option value="baja">Baja</option>
    </select>

    <button type="submit">Agregar</button>
</form>
        </section>
    </div>
</div>


    <script src="../JS/imgurlSuper.js"></script>
    <script src="../JS/modal.js"></script>
    <script src="../JS/main.js"></script>
</body>
</html>
