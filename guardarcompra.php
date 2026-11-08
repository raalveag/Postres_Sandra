<?php
$pdo = new PDO("mysql:host=localhost;dbname=dulce_anhelo;charset=utf8","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['eliminar'])){
 $id=$_GET['eliminar'];
 $pdo->prepare("DELETE FROM detalle_pedido WHERE id_pedido=?")->execute([$id]);
 $pdo->prepare("DELETE FROM pedidos WHERE id_pedido=?")->execute([$id]);
 header("Location: index.php"); exit;
}
if(!isset($_POST['guardar'])) die("No llegaron datos. Entra desde index.php <a href='index.php'>Volver</a>");

$pdo->beginTransaction();
$pdo->prepare("INSERT INTO pedidos (nombre_cliente, metodo_pago, direccion, total, estado, fecha_pedido) VALUES (?,?,?,?, 'pendiente', NOW())")
->execute([$_POST['cliente'], $_POST['pago'], $_POST['direccion'], $_POST['total']]);
$id = $pdo->lastInsertId();
$carrito = json_decode($_POST['carrito_json'], true);
foreach($carrito as $it){
 $pdo->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_unitario, subtotal) VALUES (?,?,?,?,?)")
 ->execute([$id, 3, $it['cant'], $it['precio'], $it['cant']*$it['precio']]);
}
$pdo->commit();
header("Location: index.php?ok=1");
?>