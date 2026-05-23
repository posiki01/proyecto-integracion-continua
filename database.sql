-- Base de datos para el Minimarket Familiar

-- 1. Tabla de Inventario / Productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(50),
    precio_venta DECIMAL(10,2) NOT NULL,
    stock_actual INT NOT NULL
);

-- 2. Tabla de Registro de Ventas
CREATE TABLE IF NOT EXISTS ventas (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT,
    cantidad_vendida INT NOT NULL,
    fecha_venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);

-- Insertar inventario inicial de prueba
INSERT INTO productos (nombre, categoria, precio_venta, stock_actual) VALUES 
('Arroz 1kg', 'Abarrotes', 4500.00, 50),
('Leche Entera 1L', 'Lácteos', 3800.00, 20),
('Aceite de Cocina 1L', 'Abarrotes', 12000.00, 15);