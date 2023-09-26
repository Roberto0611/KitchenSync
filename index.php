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
            <!-- Producto 3 -->
            <tr>
                <td>
                    <div class="product-item">
                        <div class="product-info">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="vertical-align: middle;">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fres.cloudinary.com%2Fwalmart-labs%2Fimage%2Fupload%2Fw_960%2Cdpr_auto%2Cf_auto%2Cq_auto%3Abest%2Fgr%2Fimages%2Fproduct-images%2Fimg_large%2F00750102051534L.jpg&f=1&nofb=1&ipt=0e4b809e764adf3356aaba6934950f58e308a6c986365ae147adfcde4dd24d35&ipo=images" alt="Producto 4">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="product-text">
                                            <h3>Leche Lala</h3>
                                            <p>Descripción del Producto 3...</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button class="delete-button">-</button>
                    </div>
                </td>
            </tr>
            <!-- Producto 4 -->
            <tr>
                <td>
                    <div class="product-item">
                        <div class="product-info">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="vertical-align: middle;">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fplayatampa.com%2Fwp-content%2Fuploads%2Fsites%2F78%2F2019%2F07%2Fshutterstock_575528746-1024x778.jpg&f=1&nofb=1&ipt=d5556cf58ceedb3f130f951bad8297a36f023d01097d324d76a8e09a8414ca41&ipo=images" alt="Producto 2">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="product-text">
                                            <h3>Platanos</h3>
                                            <p>Descripción del Producto 4...</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button class="delete-button">-</button>
                    </div>
                </td>
            </tr>
            <!-- Puedes agregar más productos aquí -->
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
