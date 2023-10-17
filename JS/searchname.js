function filtrarProductos() {
    // Obtén el valor ingresado en el campo de búsqueda
    var input = document.getElementById("busquedaProducto");
    var filtro = input.value.toUpperCase();

    // Obtén la lista de productos desplegables
    var listaDesplegable = document.getElementById("nombreProducto");
    var opciones = listaDesplegable.getElementsByTagName("option");

    // Inicializa una variable para rastrear si se encontraron resultados
    var seEncontraronResultados = false;

    // Recorre todas las opciones y muestra u oculta según la búsqueda
    for (var i = 0; i < opciones.length; i++) {
        var producto = opciones[i];
        var textoProducto = producto.textContent || producto.innerText;
        
        if (textoProducto.toUpperCase().indexOf(filtro) > -1) {
            producto.style.display = "";
            seEncontraronResultados = true;
        } else {
            producto.style.display = "none";
        }
    }

    // Muestra un mensaje si no se encontraron resultados
    var resultadosBusqueda = document.getElementById("resultadosBusqueda");
    if (!seEncontraronResultados) {
        resultadosBusqueda.innerHTML = "No se encontraron resultados.";
    } else {
        resultadosBusqueda.innerHTML = "";
    }
}