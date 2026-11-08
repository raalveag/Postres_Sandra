-- Eliminar si ya existían (para crear bien)
DROP TABLE IF EXISTS detalle_pedido;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS productos;

-- Tabla de Productos
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    icono VARCHAR(10),
    activo TINYINT(1) DEFAULT 1
);

-- Tabla de Pedidos
CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(255) NOT NULL,
    metodo_pago VARCHAR(100) NOT NULL,
    direccion TEXT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado VARCHAR(50) DEFAULT 'pendiente',
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Detalle
CREATE TABLE detalle_pedido (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_producto INT DEFAULT 0,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE
);

-- Insertar productos
INSERT INTO productos (nombre, precio, icono) VALUES
('Cupcake de Vainilla', 3.50, '🧁'),
('Cheesecake de Fresa', 4.00, '🍓'),
('Cheesecake de Oreo', 4.50, '🍪'),
('Brownie de Chocolate', 3.80, '🍫'),
('Pastel', 6.00, '🎂'),
('Roles', 2.50, '🥐'),
('Choco Flan', 4.20, '🍮'),
('Panqueque de Arándano', 3.60, '🫐'),
('Panqueque de Fresa', 3.60, '🍓'),
('Donas Glaseadas', 2.80, '🍩');