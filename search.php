<?php
include 'config.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    // Aquí puedes agregar la lógica para buscar en tu base de datos
    // y mostrar los resultados.
    echo "<h1>Resultados de búsqueda para: " . htmlspecialchars($query) . "</h1>";
    // Ejemplo de búsqueda en la base de datos
    $sql = "SELECT * FROM os_users WHERE username LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['username']) . " (" . htmlspecialchars($row['role']) . ")</p>";
        }
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
} else {
    echo "<h1>No se ha especificado una consulta de búsqueda.</h1>";
}
?>