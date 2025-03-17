<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $page = $input['page'];

    $content = '';

    switch ($page) {
        case 'dashboard':
            $content = '<h1>Dashboard</h1><p>Contenido del dashboard aquí.</p>';
            break;
        case 'gestion_bc':
            $content = '<h1>Gestión de BC</h1><p>Contenido de gestión de BC aquí.</p>';
            break;
        case 'pagos':
            $content = '<h1>Pagos</h1><p>Contenido de pagos aquí.</p>';
            break;
        case 'estadisticas':
            $content = '<h1>Estadísticas</h1><p>Contenido de estadísticas aquí.</p>';
            break;
        case 'usuarios':
            $content = '<h1>Usuarios del Sistema</h1><p>Contenido de usuarios del sistema aquí.</p>';
            break;
        case 'auditoria':
            $content = '<h1>Auditoría</h1><p>Contenido de auditoría aquí.</p>';
            break;
        case 'configuracion':
            $content = '<h1>Configuración Global</h1><p>Contenido de configuración global aquí.</p>';
            break;
        case 'soporte':
            $content = '<h1>Soporte</h1><p>Contenido de soporte aquí.</p>';
            break;
        case 'profile':
            $content = '<h1>Perfil</h1><p>Contenido del perfil aquí.</p>';
            break;
        case 'settings':
            $content = '<h1>Configuración</h1><p>Contenido de configuración aquí.</p>';
            break;
        case 'trabajos':
            $content = '<h1>Trabajos</h1><p>Contenido de trabajos aquí.</p>';
            break;
        case 'materiales_repuestos':
            $content = '<h1>Materiales y Repuestos</h1><p>Contenido de materiales y repuestos aquí.</p>';
            break;
        case 'clientes':
            $content = '<h1>Clientes</h1><p>Contenido de clientes aquí.</p>';
            break;
        case 'facturacion':
            $content = '<h1>Facturación</h1><p>Contenido de facturación aquí.</p>';
            break;
        case 'pedidos_citas':
            $content = '<h1>Pedidos y Citas</h1><p>Contenido de pedidos y citas aquí.</p>';
            break;
        case 'notificaciones':
            $content = '<h1>Notificaciones</h1><p>Contenido de notificaciones aquí.</p>';
            break;
        case 'mis_trabajos':
            $content = '<h1>Mis Trabajos</h1><p>Contenido de mis trabajos aquí.</p>';
            break;
        case 'historial_trabajos':
            $content = '<h1>Historial de Trabajos</h1><p>Contenido de historial de trabajos aquí.</p>';
            break;
        case 'solicitar_materiales':
            $content = '<h1>Solicitar Materiales/Repuestos</h1><p>Contenido de solicitar materiales/repuestos aquí.</p>';
            break;
        case 'mensajes':
            $content = '<h1>Mensajes</h1><p>Contenido de mensajes aquí.</p>';
            break;
        case 'agenda_turnos':
            $content = '<h1>Agenda de Turnos</h1><p>Contenido de agenda de turnos aquí.</p>';
            break;
        default:
            $content = '<h1>Página no encontrada</h1>';
            break;
    }

    $response = array('status' => 'success', 'content' => $content);
    echo json_encode($response);
}
?>