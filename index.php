<?php
$pdo = new PDO("mysql:host=localhost;dbname=dulce_anhelo;charset=utf8","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pedidos = $pdo->query("SELECT * FROM pedidos ORDER BY id_pedido DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dulce Anhelo - Postres Sandra</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif}
body{background:#fce4ec;padding:12px}
header{background:linear-gradient(90deg,#ff8fab,#c77dff,#7b2cbf);padding:20px;border-radius:0 0 25px 25px;color:#fff;text-align:center;font-size:28px;font-weight:900}
.fila{display:flex;gap:15px;max-width:1150px;margin:20px auto;flex-wrap:wrap}
.col{flex:1;min-width:340px}
.caja{background:#fffafc;border-radius:22px;border:3px solid #e0aaff;padding:20px;box-shadow:0 8px 20px rgba(123,44,191,.12)}
.titulo-caja{background:linear-gradient(90deg,#ff8fab,#c77dff,#7b2cbf);color:#fff;padding:12px;border-radius:16px;margin:-20px -20px 15px -20px;text-align:center;font-weight:800;font-size:16px}
.producto{display:flex;justify-content:space-between;align-items:center;background:#fff0f6;padding:12px;margin:8px 0;border-radius:12px;border-left:4px solid #7b2cbf}
.producto b{color:#5a189a}
.producto span{color:#ff4d8d;font-weight:700}
.btn-agregar{background:linear-gradient(90deg,#c77dff,#7b2cbf);color:#fff;border:none;padding:8px 15px;border-radius:20px;font-weight:700;cursor:pointer}
.item-carrito{background:#f3e5f5;padding:10px;border-radius:10px;margin:6px 0;display:flex;justify-content:space-between;font-size:14px;color:#5a189a}
input,textarea,select{width:100%;padding:11px;margin:6px 0;border:2px solid #e0aaff;border-radius:11px;outline:none}
.btn-guardar{width:100%;padding:14px;border:none;border-radius:20px;background:linear-gradient(90deg,#c77dff,#7b2cbf);color:#fff;font-weight:800;cursor:pointer;margin-top:10px}
.btn-guardar:disabled{background:#e0aaff;cursor:not-allowed}
.tabla{width:100%;border-collapse:collapse;background:#fff}
.tabla th{background:linear-gradient(90deg,#ffb3d6,#d8b4fe);color:#fff;padding:10px;text-align:left;font-size:13px}
.tabla td{padding:10px;border-bottom:1px solid #f3e5f5;color:#5a189a;font-size:13px}
.btn-eliminar{background:#ff5a6a;color:#fff;padding:6px 10px;border-radius:20px;text-decoration:none;font-weight:700;font-size:12px}
</style>
</head>
<body>
<header>🧁 Dulce Anhelo - Postres Sandra</header>

<div class="fila">
<div class="col">
<div class="caja">
<div class="titulo-caja">📋 Productos Disponibles</div>
<div class="producto"><div><b>🧁 Cupcake de Vainilla</b><br><span>$3.50</span></div><button class="btn-agregar" onclick="agregar('Cupcake de Vainilla',3.5)">+ Agregar</button></div>
<div class="producto"><div><b>🍓 Cheesecake de Fresa</b><br><span>$4.00</span></div><button class="btn-agregar" onclick="agregar('Cheesecake de Fresa',4)">+ Agregar</button></div>
<div class="producto"><div><b>🍪 Cheesecake de Oreo</b><br><span>$4.50</span></div><button class="btn-agregar" onclick="agregar('Cheesecake de Oreo',4.5)">+ Agregar</button></div>
<div class="producto"><div><b>🍮 Choco Flan</b><br><span>$4.20</span></div><button class="btn-agregar" onclick="agregar('Choco Flan',4.2)">+ Agregar</button></div>
<div class="producto"><div><b>🍫 Brownie de Chocolate</b><br><span>$3.80</span></div><button class="btn-agregar" onclick="agregar('Brownie de Chocolate',3.8)">+ Agregar</button></div>
<div class="producto"><div><b>🍰 Pastel</b><br><span>$6.00</span></div><button class="btn-agregar" onclick="agregar('Pastel',6)">+ Agregar</button></div>
</div>
</div>

<div class="col">
<div class="caja">
<div class="titulo-caja">🛒 Tu Pedido</div>
<div id="carritoDiv" style="text-align:center;color:#9d7ac5;padding:15px">Tu carrito está vacío 😊<br>Agrega productos</div>
<form method="POST" action="guardarcompra.php" id="formPedido">
<h4 style="color:#5a189a;margin:10px 0 5px">📄 Datos del Cliente</h4>
<input type="text" name="cliente" id="cliente" placeholder="👤 Nombre Completo" required oninput="validar()">
<input type="text" name="pago" placeholder="💳 Método de Pago (tarjeta/efectivo)" value="tarjeta">
<textarea name="direccion" placeholder="📍 Dirección de Entrega"></textarea>
<input type="hidden" name="total" id="totalInput">
<input type="hidden" name="carrito_json" id="carritoJson">
<button type="submit" name="guardar" id="btnGuardar" class="btn-guardar" disabled>💾 GUARDAR COMPRA — $0.00</button>
</form>
<?php if(isset($_GET['ok'])) echo "<p style='color:green;text-align:center;margin-top:10px;font-weight:800'>✅ Pedido guardado correctamente!</p>"; ?>
</div>
</div>
</div>

<div style="max-width:1150px;margin:0 auto">
<div class="caja" style="padding:0;overflow:hidden">
<div class="titulo-caja" style="margin:0;border-radius:0">📋 Historial de Compras Realizadas</div>
<table class="tabla">
<tr><th>Fecha</th><th>Cliente</th><th>Pedido</th><th>Total</th><th>Pago</th><th>Acciones</th></tr>
<?php foreach($pedidos as $p): ?>
<tr>
<td>Pedido #<?=$p['id_pedido']?><br><small><?=$p['fecha_pedido']?></small></td>
<td><?=$p['nombre_cliente']?></td>
<td>Pedido #<?=$p['id_pedido']?></td>
<td style="color:#c9a20a;font-weight:800">$<?=$p['total']?></td>
<td><?=$p['metodo_pago']?></td>
<td>
 <button class="btn-editar" onclick="abrirModal(<?=$p['id_pedido']?>, '<?=$p['nombre_cliente']?>', '<?=$p['total']?>')">Editar</button>
  <a class="btn-eliminar" href="guardarcompra.php?eliminar=<?=$p['id_pedido']?>" onclick="return confirm('¿Eliminar este pedido?')" style="background:#ff5a6a;color:#fff;padding:6px 12px;border-radius:20px;text-decoration:none;font-weight:700">Eliminar</a>
</td>
<?php endforeach; ?>
</table>
</div>
</div>

<script>
let carrito=[];
function agregar(nombre,precio){
 let ex=carrito.find(p=>p.nombre===nombre);
 if(ex) ex.cant++; else carrito.push({nombre,precio,cant:1});
 render();
}
function render(){
 let div=document.getElementById('carritoDiv');
 let total=0; div.innerHTML='';
 if(carrito.length==0){
  div.innerHTML='Tu carrito está vacío 😊<br>Agrega productos';
  document.getElementById('btnGuardar').disabled=true;
  document.getElementById('btnGuardar').innerText='💾 GUARDAR COMPRA — $0.00';
  return;
 }
 carrito.forEach((it,i)=>{
  total+=it.precio*it.cant;
  div.innerHTML+=`<div class="item-carrito"><span>${it.nombre} x${it.cant}</span><span>$${(it.precio*it.cant).toFixed(2)} <button type="button" onclick="carrito[${i}].cant--; if(carrito[${i}].cant<=0) carrito.splice(${i},1); render()" style="border:none;background:#e0aaff;border-radius:50%;width:22px;cursor:pointer">-</button> <button type="button" onclick="carrito[${i}].cant++; render()" style="border:none;background:#7b2cbf;color:#fff;border-radius:50%;width:22px;cursor:pointer">+</button></span></div>`;
 });
 document.getElementById('totalInput').value=total.toFixed(2);
 document.getElementById('carritoJson').value=JSON.stringify(carrito);
 document.getElementById('btnGuardar').innerText=`💾 GUARDAR COMPRA — $${total.toFixed(2)}`;
 validar();
}
function validar(){
 let cliente=document.getElementById('cliente').value.trim();
 document.getElementById('btnGuardar').disabled=!(cliente!='' && carrito.length>0);
}
</script>
</body>
</html>