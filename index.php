<?php
header("Content-Type: application/json");

// Configuración de la conexión a la Base de Datos (Simulada o MySQL)
$host = "localhost";
$user = "root";
$password = "";
$database = "minimarket_familiar";

// Mensaje de bienvenida inicial (Modelo de Negocio)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['accion'])) {
    echo json_encode([
        "status" => "Activo",
        "negocio" => "Minimarket Familiar - Sistema de Integración Continua (PHP Backend)"
    ]);
    exit;
}

// Endpoint para VER EL INVENTARIO (Simulado con un array para evitar errores de conexión inmediata)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion']) && $_GET['accion'] === 'inventario') {
    $inventario = [
        ["id" => 1, "nombre" => "Arroz 1kg", "categoria" => "Abarrotes", "precio" => 4500.00, "stock" => 50],
        ["id" => 2, "nombre" => "Leche Entera 1L", "categoria" => "Lácteos", "precio" => 3800.00, "stock" => 20],
        ["id" => 3, "nombre" => "Aceite de Cocina 1L", "categoria" => "Abarrotes", "precio" => 12000.00, "stock" => 15]
    ];
    
    echo json_encode(["inventario" => $inventario]);
    exit;
}

// Endpoint para SIMULAR UNA VENTA
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['accion']) && $_GET['accion'] === 'vender') {
    $producto_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 1;

    // Simulación de éxito de venta restando stock
    if ($producto_id === 1) {
        $nuevo_stock = 50 - $cantidad;
        echo json_encode([
            "mensaje" => "Venta exitosa en Minimarket Familiar",
            "producto" => "Arroz 1kg",
            "cantidad_vendida" => $cantidad,
            "nuevo_stock_restante" => $nuevo_stock
        ]);
    } else {
        echo json_encode(["error" => "Producto no encontrado o sin stock suficiente."]);
    }
    exit;
}
?>