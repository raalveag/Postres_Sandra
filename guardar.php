<?php
$pdo = new PDO("mysql:host=127.0.0.1;dbname=dulce_anhelo;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Mapa de tus productos (id_producto real de tu BD)
$mapa = [
    'Cupcake de Vainilla' => 1,
    'Cheesecake de Fresa' => 2,
    'Cheesecake de Oreo' => 3,
    'Brownie de Chocolate' => 4,
    'Pastel' => 5,
    'Roles' => 6,
    'Choco Flan' => 7
];

if (isset($_POST['guardar'])) {
    try {
        $pdo->beginTransaction();

        // 1. Guarda en pedidos -> nombre_cliente, metodo_pago, direccion, total, estado
        $cliente = $_POST['cliente'];
        $pago = $_POST['pago'] ?: 'tarjeta';
        $direccion = $_POST['direccion'];
        $total = $_POST['total'];

        $stmt = $pdo->prepare("INSERT INTO pedidos (nombre_cliente, metodo_pago, direccion, total, estado) VALUES (?,?,?,?, 'pendiente')");
        $stmt->execute([$cliente, $pago, $direccion, $total]);
        $id_pedido = $pdo->lastInsertId(); // el #5, #6, etc

        // 2. Guarda cada producto en detalle_pedido
        $carrito = json_decode($_POST['carrito_json'], true);
        foreach ($carrito as $item) {
            $id_prod = $mapa[$item['nombre']] ?? 1;
            $cant = $item['cant'];
            $precio = $item['precio'];
            $subtotal = $cant * $precio;

            $stmt2 = $pdo->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal) VALUES (?,?,?,?,?)");
            $stmt2->execute([$id_pedido, $id_prod, $cant, $precio, $subtotal]);
        }

        $pdo->commit();
        echo "<script>alert('✅ Pedido #$id_pedido guardado chido!'); window.location='index.php';</script>";

    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error al guardar: " . $e->getMessage();
    }
}
?>