<?php
session_start();

// CONEXIÓN
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "dulce_anhelo";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);
if (!$conexion) {
    die("❌ NO HAY CONEXIÓN: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8mb4");

// LISTA DE PRODUCTOS CON PRECIOS E ICONOS
$precios = [
    'Cupcake de Vainilla'      => 3.50,
    'Cheesecake de Fresa'      => 4.00,
    'Cheesecake de Oreo'       => 4.50,
    'Brownie de Chocolate'     => 3.80,
    'Pastel'                   => 6.00,
    'Roles'                    => 2.50,
    'Choco Flan'               => 4.20,
    'Panqueque de Arándano'    => 3.60,
    'Panqueque de Fresa'       => 3.60,
    'Donas Glaseadas'          => 2.80
];

$iconos = [
    'Cupcake de Vainilla'      => '🧁',
    'Cheesecake de Fresa'      => '🍓',
    'Cheesecake de Oreo'       => '🍪',
    'Brownie de Chocolate'     => '🍫',
    'Pastel'                   => '🎂',
    'Roles'                    => '🥐',
    'Choco Flan'               => '🍮',
    'Panqueque de Arándano'    => '🫐',
    'Panqueque de Fresa'       => '🍓',
    'Donas Glaseadas'          => '🍩'
];

if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];

// ELIMINAR COMPRA
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'eliminar_compra') {
    $id_pedido = (int)($_POST['id_pedido'] ?? 0);
    if ($id_pedido) {
        $stmt = mysqli_prepare($conexion, "DELETE FROM pedidos WHERE id_pedido = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_pedido);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: comprar.php");
    exit;
}

// AGREGAR / QUITAR DEL CARRITO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $prod = $_POST['producto'] ?? '';
    
    if ($accion === 'vaciar') {
        $_SESSION['carrito'] = [];
        header("Location: comprar.php");
        exit;
    } elseif ($prod !== '' && isset($precios[$prod])) {
        if ($accion === 'agregar') {
            $_SESSION['carrito'][$prod] = ($_SESSION['carrito'][$prod] ?? 0) + 1;
        } elseif ($accion === 'quitar' && isset($_SESSION['carrito'][$prod])) {
            $_SESSION['carrito'][$prod]--;
            if ($_SESSION['carrito'][$prod] <= 0) unset($_SESSION['carrito'][$prod]);
        } elseif ($accion === 'eliminar') {
            unset($_SESSION['carrito'][$prod]);
        }
        header("Location: comprar.php");
        exit;
    }
}

// CALCULAR TOTAL DEL CARRITO
$total_general = 0;
foreach ($_SESSION['carrito'] as $n => $c) {
    if (isset($precios[$n])) {
        $total_general += $precios[$n] * $c;
    }
}

// LEER COMPRAS GUARDADAS PARA EL HISTORIAL
// Primero intentamos ordenar por fecha, si no existe usamos id_pedido
$result = @mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY fecha_pedido DESC, id_pedido DESC");
if (!$result) {
    $result = mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY id_pedido DESC");
}

$historial = [];
while ($pedido = mysqli_fetch_assoc($result)) {
    $detalle_texto = '';
    $id_ped = $pedido['id_pedido'];
    
    // Obtener productos de este pedido
    $sd = mysqli_query($conexion, "
        SELECT p.nombre, d.cantidad 
        FROM detalle_pedido d 
        JOIN productos p ON d.id_producto = p.id_producto 
        WHERE d.id_pedido = " . (int)$id_ped
    );
    
    while ($item = mysqli_fetch_assoc($sd)) {
        $icon = $iconos[$item['nombre']] ?? '🛍️';
        $detalle_texto .= $icon . ' ' . htmlspecialchars($item['nombre']) . ' ×' . $item['cantidad'] . '  ';
    }
    
    $historial[] = [
        'fecha' => $pedido['fecha'] ?? null,
        'id' => $pedido['id_pedido'],
        'cliente' => $pedido['nombre_cliente'],
        'pedido' => $detalle_texto,
        'total' => $pedido['total'],
        'pago' => $pedido['metodo_pago']
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dulce Anhelo - Comprar y Pagar</title>
    <style>

       * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
body { 
    background: linear-gradient(135deg, #fce4ec, #f3e5f5, #e8eaf6); 
    min-height: 100vh; 
}

/* CABECERA */
header {
    background: linear-gradient(90deg, #ff8fab, #c77dff, #7b2cbf);
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 4px solid #e0aaff;
    border-radius: 0 0 30px 30px;
    box-shadow: 0 4px 20px rgba(123,44,191,.25);
}
.logo {
    font-size: 32px;
    font-weight: 900;
    color: #fff;
}
nav { display: flex; gap: 12px; flex-wrap: wrap; }
nav a {
    background: #fff;
    color: #7b2cbf;
    padding: 12px 24px;
    border-radius: 30px;
    border: 2px solid #e0aaff;
    text-decoration: none;
    font-weight: bold;
}
nav a:last-child { 
    background: linear-gradient(90deg, #ff8fab, #7b2cbf); 
    color: #fff; 
    border-color: transparent; 
}

.contenido { padding: 30px; max-width: 1200px; margin: 0 auto; }
.fila { display: flex; flex-wrap: wrap; gap: 25px; margin-bottom: 30px; align-items: flex-start; }
.col { flex: 1; min-width: 350px; }

.caja {
    background: #fffafc;
    border-radius: 25px;
    border: 3px solid #e0aaff;
    padding: 25px;
    box-shadow: 0 8px 25px rgba(123,44,191,.12);
}
.titulo-caja {
    background: linear-gradient(90deg, #ff8fab, #c77dff, #7b2cbf);
    color: #fff;
    padding: 15px 25px;
    border-radius: 20px;
    margin: -25px -25px 20px -25px;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.producto {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 15px;
    margin: 10px 0;
    background: #fff0f6;
    border-radius: 15px;
    border-left: 4px solid #7b2cbf;
}
.producto div { flex: 1; }
.btn-agregar {
    background: linear-gradient(90deg, #c77dff, #7b2cbf) !important;
    color: #fff !important;
    border: none !important;
    padding: 10px 20px !important;
    border-radius: 20px !important;
    font-weight: bold !important;
    cursor: pointer !important;
}

.item-carrito {
    padding: 15px;
    margin: 10px 0;
    background: #f3e5f5;
    border-radius: 15px;
    border-left: 4px solid #c77dff;
}
.btn-cant {
    width: 36px; height: 36px;
    border-radius: 50%;
    border: none;
    font-weight: bold;
    cursor: pointer;
}
.btn-menos { background: #e0aaff; color: #5a189a; }
.btn-mas { background: linear-gradient(90deg, #c77dff, #7b2cbf); color: #fff; }

/* FORMULARIOS CHIDOS */
input, textarea {
    width: 100%;
    padding: 14px 16px 14px 44px;
    border: 2px solid #e0aaff;
    border-radius: 15px;
    margin: 8px 0;
    background: #fff;
    color: #5a189a;
    font-size: 14px;
}
input:focus, textarea:focus {
    outline: none;
    border-color: #7b2cbf;
    box-shadow: 0 0 0 3px rgba(199,125,255,0.2);
}
.btn-guardar {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 20px;
    background: linear-gradient(90deg, #c77dff, #7b2cbf);
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
}
.btn-guardar:disabled { opacity: .6; cursor: not-allowed; background: #e0aaff; }

/* HISTORIAL */
.caja-historial {
    background: linear-gradient(180deg, #ff8fab 0%, #c77dff 50%, #7b2cbf 100%);
    border-radius: 25px;
    padding: 3px;
    margin-top: 20px;
}
.interior-historial {
    background: #fffafc;
    border-radius: 22px;
    padding: 25px;
}
.titulo-historial {
    background: linear-gradient(90deg, #ff8fab, #c77dff, #7b2cbf);
    color: #fff;
    padding: 18px;
    border-radius: 20px 20px 0 0;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    margin: -25px -25px 20px -25px;
}
.tabla-historial {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 15px;
    overflow: hidden;
    border: 2px solid #e0aaff;
}
.tabla-historial th {
    background: linear-gradient(90deg, #ff8fab, #c77dff);
    color: #fff;
    padding: 14px 10px;
    text-align: left;
    font-weight: bold;
}
.tabla-historial td {
    padding: 14px 10px;
    border-bottom: 1px solid #f3e5f5;
    background: #fff;
    color: #5a189a;
}
.btn-editar {
    background: #ffb703;
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 15px;
    font-weight: bold;
    cursor: pointer;
    margin: 2px;
}
.btn-eliminar {
    background: #ff4d6d;
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 15px;
    font-weight: bold;
    cursor: pointer;
    margin: 2px;
}
.btn-recibo {
    background: linear-gradient(90deg, #90e0ef, #7b2cbf);
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 15px;
    font-weight: bold;
    cursor: pointer;
    margin: 2px;
}
.vacio {
    text-align: center;
    padding: 40px;
    color: #7b2cbf;
}
.enlaces {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    justify-content: center;
}
.enlaces a {
    background: #fff;
    color: #7b2cbf;
    padding: 12px 30px;
    border-radius: 30px;
    border: 2px solid #c77dff;
    text-decoration: none;
    font-weight: bold;
}
/* --- SOLO TABLA PURA, SIN HEADER DE HISTORIAL --- */

.caja-historial {
  background: transparent !important;
  padding: 0 !important;
  border-radius: 0 !important;
  box-shadow: none !important;
  border: none !important;
}

.interior-historial {
  background: transparent !important;
  border-radius: 0 !important;
  padding: 0 !important;
}

/* ESTO BORRA EL TITULO ROSA/MORADO */
.titulo-historial {
  display: none !important;
}

.tabla-historial {
  width: 100% !important;
  margin: 0 !important;
  border: 2.5px solid #e0aaff !important;
  border-radius: 20px !important;
  overflow: hidden !important;
  box-shadow: 0 10px 30px rgba(123,44,191,0.12) !important;
}
    </style>
</head>
<body>
    <header>
        <div class="logo">🌸 Dulce Anhelo 💜</div>
        <nav>
            <a href="#">🌸 Inicio</a>
            <a href="#">🍰 Menú</a>
            <a href="">💜 Nosotros</a>
            <a href="contacto.php">💌 Contacto</a>
            <a href="comprar.php">🛒 Comprar y Pagar</a>
        </nav>
    </header>

    <div class="contenido">
        <div class="fila">
            <!-- PRODUCTOS IZQUIERDA -->
            <div class="col">
                <div class="caja">
                    <div class="titulo-caja">📋 Productos Disponibles</div>
                    <?php foreach ($precios as $nombre => $precio): ?>
                        <form method="post" class="producto">
                            <div>
                                <strong><?=$iconos[$nombre]?> <?=htmlspecialchars($nombre)?></strong><br>
                                <span style="color:#d63384; font-weight:bold">$<?=number_format($precio,2)?></span>
                            </div>
                            <button type="submit" name="accion" value="agregar" class="btn-agregar">+ Agregar</button>
                            <input type="hidden" name="producto" value="<?=htmlspecialchars($nombre)?>">
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- CARRITO DERECHA -->
            <div class="col">
                <div class="caja">
                    <div class="titulo-caja">🛒 Tu Pedido</div>
                    
                    <?php if (!empty($_SESSION['carrito'])): ?>
                        <form method="post" style="margin-bottom:15px;">
                            <button name="accion" value="vaciar" class="btn-eliminar" style="width:100%">🗑️ Vaciar Todo</button>
                        </form>
                    <?php endif; ?>

                    <?php if (empty($_SESSION['carrito'])): ?>
                        <p style="text-align:center; color:#888; padding:20px;">Tu carrito está vacío 😊<br>Agrega productos del lado izquierdo</p>
                    <?php else: ?>
                        <?php foreach ($_SESSION['carrito'] as $np => $cant): ?>
                            <div class="item-carrito">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                                    <div>
                                        <strong><?=$iconos[$np]?> <?=htmlspecialchars($np)?></strong><br>
                                        <small style="color:#d63384">$<?=number_format($precios[$np],2)?> c/u</small>
                                    </div>
                                    <form method="post">
                                        <button name="accion" value="eliminar" class="btn-eliminar">🗑️</button>
                                        <input type="hidden" name="producto" value="<?=htmlspecialchars($np)?>">
                                    </form>
                                </div>
                                <form method="post" style="display:flex; gap:10px; align-items:center;">
                                    <button name="accion" value="quitar" class="btn-cant btn-menos">−</button>
                                    <span style="font-weight:bold; font-size:18px; min-width:30px; text-align:center;"><?=$cant?></span>
                                    <button name="accion" value="agregar" class="btn-cant btn-mas">+</button>
                                    <input type="hidden" name="producto" value="<?=htmlspecialchars($np)?>">
                                </form>
                                <div style="margin-top:8px; font-weight:bold; color:#d63384;">
                                    Subtotal: $<?=number_format($precios[$np]*$cant,2)?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div style="font-size:22px; font-weight:900; color:#d4af37; padding:15px; border-top:2px solid #ffd700; margin-top:15px; text-align:right;">
                            💰 TOTAL: $<?=number_format($total_general,2)?>
                        </div>
                    <?php endif; ?>

                    <h4 style="margin:25px 0 10px;">📝 Datos del Cliente</h4>
                    <form action="guardarcompra.php" method="post">
                        <input type="text" name="nombre_cliente" placeholder="👤 Nombre Completo" required>
                        <input type="text" name="metodo_pago" placeholder="💳 Método de Pago" required>
                        <textarea name="direccion" rows="3" placeholder="📍 Dirección de Entrega" required></textarea>
                        <button type="submit" name="accion" value="guardarcompra" class="btn-guardar" <?=empty($_SESSION['carrito']) ? 'disabled' : ''?>>
                            💾 GUARDAR COMPRA — $<?=number_format($total_general,2)?>
                        </button>
                    </form>
                </div>
                
                <div class="enlaces">
                    <a href="contacto.php">← Dejar un mensaje</a>
                    <a href="menu.php">🏠 Inicio</a>
                </div>
            </div>
        </div>

        <!-- HISTORIAL DE COMPRAS -->
        <div class="caja-historial">
            <div class="interior-historial">
                <div class="titulo-historial">
                    📋 Historial de Compras Realizadas<br>
                    <small style="font-weight:normal; font-size:14px;">edita tus registros ✨</small>
                </div>
                
                <?php if (empty($historial)): ?>
                    <p class="vacio">Aún no hay compras guardadas 🛍️<br>Realiza tu primera compra para que cheques tu pedido💖</p>
                <?php else: ?>
                    <table class="tabla-historial">
                        <thead>
                            <tr>
                                <th>📅 Fecha</th>
                                <th>👤 Cliente</th>
                                <th>🛍️ Pedido</th>
                                <th>💰 Total</th>
                                <th>💳 Pago</th>
                                <th>⚙️ Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historial as $compra): ?>
                                <tr>
                                    <td>
                                        <?php 
                                        if (!empty($compra['fecha_pedido'])) {
                                            echo date('d/m/Y H:i', strtotime($compra['fecha_pedido']));
                                        } else {
                                            echo 'Pedido #' . $compra['id'];
                                        }
                                        ?>
                                    </td>
                                    <td><?=htmlspecialchars($compra['cliente'])?></td>
                                    <td><?=$compra['pedido']?></td>
                                    <td><strong style="color:#d4af37">$<?=number_format($compra['total'],2)?></strong></td>
                                    <td><?=htmlspecialchars($compra['pago'])?></td>
                                    <td>
                                        <a href="modificar.php?id=<?=$compra['id']?>" class="btn-modificar" style="text-decoration:none; display:inline-block;">modiicar</a>
                                        
                                        <form method="post" style="display:inline;" onsubmit="return confirm('¿Eliminar esta compra?');">
                                            <input type="hidden" name="id_pedido" value="<?=$compra['id']?>">
                                            <button type="submit" name="accion" value="eliminar_compra" class="btn-eliminar">🗑️ Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

