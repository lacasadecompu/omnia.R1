<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnia.R1</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="assets/images/logo.png" alt="Logo">
    </div>
    <div class="user-info">
        <?php if (isset($_SESSION['username'])): ?>
            <p>Bienvenido, <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['role']; ?>)</p>
        <?php else: ?>
            <p>No has iniciado sesión</p>
        <?php endif; ?>
    </div>
</header>