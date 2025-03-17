<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Establecer la imagen predeterminada si no hay una imagen de perfil
$profileImage = isset($_SESSION['profile_image']) && !empty($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'default.jpg';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnia.R1</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="assets/images/logo.png" alt="Logo">
    </div>
    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Buscar...">
        <button id="search-button">
            <img src="assets/images/search-icon.png" alt="Buscar">
        </button>
    </div>
    <div class="user-info">
        <?php if (isset($_SESSION['username'])): ?>
            <div class="user-details">
                <div class="user-image">
                    <img src="assets/profile_images/<?php echo $profileImage; ?>" alt="Imagen de perfil">
                </div>
                <div class="user-text">
                    <p class="username"><?php echo $_SESSION['username']; ?></p>
                    <p class="role"><?php echo $_SESSION['role']; ?></p>
                </div>
            </div>
            <div class="user-icons">
                <i class="fas fa-bell"></i>
                <i class="fas fa-envelope"></i>
            </div>
        <?php else: ?>
            <p>No has iniciado sesión</p>
        <?php endif; ?>
    </div>
</header>
<script src="assets/js/scripts.js"></script>
</body>
</html>