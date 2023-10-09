// Agregar evento "change" al desplegable
document.getElementById('nombreProducto').addEventListener('change', function() {
    // Obtener el valor seleccionado
    const selectedName = this.value;

    // Realizar una solicitud AJAX para obtener la imagenURL correspondiente
    // y establecerla en el campo "imagenURL"
    fetch('obtener_imagen.php?nombre=' + selectedName)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('imagenURL').value = data.url;
            } else {
                alert('No se pudo obtener la imagen.');
            }
        })
        .catch(error => {
            alert('Error al obtener la imagen: ' + error.message);
        });
});
