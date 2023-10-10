document.getElementById('nombreProducto').addEventListener('change', function() {
    const selectedName = this.value;

    fetch('../obtener_imagen.php?nombre=' + selectedName)
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