<?php
include '../config.php';
require '../vendor/autoload.php'; // Asegúrate de tener PHPMailer instalado

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales del usuario
    $sql = "SELECT * FROM os_users WHERE username = ? AND password = MD5(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['2fa_enabled']) {
            // Generar el código de 2FA
            $code = rand(100000, 999999);
            $_SESSION['2fa_code'] = $code;
            $_SESSION['2fa_expires'] = time() + 300; // 5 minutos

            // Enviar el código de 2FA por correo electrónico
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor de correo
                $mail->isSMTP();
                $mail->Host = '127.0.0.1'; // Cambia esto por tu servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'test@localhost.com'; // Cambia esto por tu correo
                $mail->Password = '123'; // Cambia esto por tu contraseña
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //
                $mail->Port = 587;

                // Configuración del correo
                $mail->setFrom('test@localhost.com', 'Omnia.R1');
                $mail->addAddress($user['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Código de autenticación de dos factores';
                $mail->Body = "Tu código de autenticación es: $code";

                $mail->send();
                header("Location: verify_2fa.php");
                exit();
            } catch (Exception $e) {
                $error = "No se pudo enviar el correo de 2FA. Error: {$mail->ErrorInfo}";
            }
        } else {
            header("Location: ../index.php");
            exit();
        }
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Omnia.R1</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>