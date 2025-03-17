document.addEventListener('DOMContentLoaded', function() {
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
});