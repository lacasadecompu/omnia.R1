<?php
if (!function_exists('checkRole')) {
    function checkRole($role) {
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin() {
        return checkRole('superadmin');
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin() {
        return checkRole('admin');
    }
}

if (!function_exists('isUser')) {
    function isUser() {
        return checkRole('user');
    }
}

if (!function_exists('isRecepcionist')) {
    function isRecepcionist() {
        return checkRole('recepcionist');
    }
}
?>