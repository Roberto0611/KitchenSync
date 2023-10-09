//Made by: Roberto Ochoa Cuevas

// Agrega un evento input al campo de búsqueda
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase(); // Obtén el término de búsqueda en minúsculas

    // Recorre todos los elementos de productos y verifica si coinciden con el término de búsqueda
    const productItems = document.querySelectorAll('.product-item');
    productItems.forEach(function(item) {
        const productName = item.querySelector('h3').textContent.toLowerCase(); // Obtén el nombre del producto en minúsculas
        if (productName.includes(searchTerm)) {
            // Si el nombre del producto coincide, muestra el elemento
            item.style.display = 'flex';
        } else {
            // Si no coincide, oculta el elemento
            item.style.display = 'none';
        }
    });
});
