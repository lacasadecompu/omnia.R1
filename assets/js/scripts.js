document.addEventListener('DOMContentLoaded', function() {
    // Código existente para cargar páginas
    document.querySelectorAll('aside nav ul li a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const page = this.getAttribute('data-page');
            loadPage(page);
        });
    });

    function loadPage(page) {
        fetch('ajax/load_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ page: page })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById('main-content').innerHTML = data.content;
            } else {
                alert('Error al cargar los datos');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // código para la búsqueda
    const searchButton = document.getElementById('search-button');
    const searchInput = document.getElementById('search-input');

    function performSearch() {
        const query = searchInput.value;
        window.location.href = `search.php?q=${query}`;
    }

    searchButton.addEventListener('click', performSearch);

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Evitar el comportamiento predeterminado del Enter
            performSearch();
        }
    });
});