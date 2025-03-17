<?php
include 'functions.php';
?>
<aside>
    <nav>
        <ul>
            <li><a href="#" data-page="dashboard">Dashboard</a></li>
            <?php if (isSuperAdmin()): ?>
                <li><a href="#" data-page="gestion_bc">Gestión de BC</a></li>
                <li><a href="#" data-page="pagos">Pagos</a></li>
                <li><a href="#" data-page="estadisticas">Estadísticas</a></li>
                <li><a href="#" data-page="usuarios">Usuarios del Sistema</a></li>
                <li><a href="#" data-page="auditoria">Auditoría</a></li>
                <li><a href="#" data-page="configuracion">Configuración Global</a></li>
                <li><a href="#" data-page="soporte">Soporte</a></li>
            <?php elseif (isAdmin()): ?>
                <li><a href="#" data-page="trabajos">Trabajos</a></li>
                <li><a href="#" data-page="materiales_repuestos">Materiales y Repuestos</a></li>
                <li><a href="#" data-page="clientes">Clientes</a></li>
                <li><a href="#" data-page="facturacion">Facturación</a></li>
                <li><a href="#" data-page="estadisticas">Estadísticas</a></li>
                <li><a href="#" data-page="pedidos_citas">Pedidos y Citas</a></li>
                <li><a href="#" data-page="notificaciones">Notificaciones</a></li>
                <li><a href="#" data-page="usuarios">Usuarios</a></li>
            <?php elseif (isUser()): ?>
                <li><a href="#" data-page="mis_trabajos">Mis Trabajos</a></li>
                <li><a href="#" data-page="historial_trabajos">Historial de Trabajos</a></li>
                <li><a href="#" data-page="solicitar_materiales">Solicitar Materiales/Repuestos</a></li>
                <li><a href="#" data-page="notificaciones">Notificaciones</a></li>
                <li><a href="#" data-page="mensajes">Mensajes</a></li>
            <?php elseif (isRecepcionist()): ?>
                <li><a href="#" data-page="agenda_turnos">Agenda de Turnos</a></li>
                <li><a href="#" data-page="mis_trabajos">Mis Trabajos</a></li>
                <li><a href="#" data-page="notificaciones">Notificaciones</a></li>
                <li><a href="#" data-page="mensajes">Mensajes</a></li>
                <li><a href="#" data-page="historial_trabajos">Historial de Trabajos</a></li>
                <li><a href="#" data-page="solicitar_materiales">Solicitar Materiales/Repuestos</a></li>
                <li><a href="#" data-page="estadisticas">Estadísticas</a></li>
            <?php endif; ?>
            <li><a href="#" data-page="profile">Perfil</a></li>
            <li><a href="#" data-page="settings">Configuración</a></li>
            <li><a href="#" id="logout-link">Cerrar sesión</a></li>
        </ul>
    </nav>
</aside>

<script>
document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault();
    alert("Sesión cerrada con éxito.");
    window.location.href = "logout.php";
});
</script>