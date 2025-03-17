<?php
if (!isset($_SESSION['username'])) {
    header("Location: views/login.php");
    exit();
}
?>