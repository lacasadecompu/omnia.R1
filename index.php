<?php
include 'config.php';
include 'includes/auth.php';
include 'includes/functions.php'; // Asegúrate de incluir las funciones antes del sidebar
include 'includes/header.php';
?>

<div class="container">
    <?php include 'includes/sidebar.php'; ?>

    <main id="main-content">
        <h1>Bienvenido a Omnia.R1</h1>
        <div id="content">
            <p>Contenido principal aquí.</p>
        </div>
    </main>
</div>

<?php
include 'includes/footer.php';
?>