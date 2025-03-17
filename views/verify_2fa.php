<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];

    if (isset($_SESSION['2fa_code']) && isset($_SESSION['2fa_expires']) && time() < $_SESSION['2fa_expires']) {
        if ($code == $_SESSION['2fa_code']) {
            unset($_SESSION['2fa_code']);
            unset($_SESSION['2fa_expires']);
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Código de autenticación incorrecto";
        }
    } else {
        $error = "El código de autenticación ha expirado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar 2FA - Omnia.R1</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Verificar Código de Autenticación</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="code">Código de Autenticación:</label>
            <input type="text" id="code" name="code" required>
            <button type="submit">Verificar</button>
        </form>
    </div>
</body>
</html>