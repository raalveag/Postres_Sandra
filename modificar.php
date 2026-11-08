<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Historial Modificar</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
body { background: #fce4fb; min-height: 100vh; padding: 30px; }

/* CONTENEDOR PRINCIPAL - COMO TU FOTO */
.caja-historial {
  max-width: 950px;
  margin: 0 auto;
  background: linear-gradient(90deg, #ff8fab 0%, #c77dff 60%, #7b2cbf 100%);
  border-radius: 22px;
  padding: 3px;
  box-shadow: 0 10px 30px rgba(123,44,191,0.2);
}
.interior-historial {
  background: #fffafc;
  border-radius: 20px;
  overflow: hidden;
}
.titulo-historial {
  background: linear-gradient(90deg, #ff9eb0, #c77dff, #7b2cbf);
  color: #fff;
  padding: 18px;
  text-align: center;
  font-size: 19px;
  font-weight: 800;
}
.titulo-historial small {
  display: block;
  font-weight: 400;
  font-size: 13px;
  margin-top: 4px;
  opacity: 0.9;
}

/* TABLA */
.tabla-historial {
  width: 96%;
  margin: 14px auto;
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 16px;
  overflow: hidden;
  border: 2px solid #e0aaff;
  background: #fff;
}
.tabla-historial th {
  background: linear-gradient(90deg, #ffb3d6, #d8b4fe);
  color: #fff;
  padding: 13px 10px;
  font-size: 13px;
  text-align: left;
}
.tabla-historial td {
  padding: 16px 10px;
  font-size: 14px;
  color: #5a189a;
  border-bottom: 1px solid #f3e5f5;
}
.tabla-historial tr:last-child td { border-bottom: none; }
.tabla-historial td:nth-child(4) { color: #c9a20a; font-weight: 800; }

.btn-editar {
  background: #ffb703;
  color: #fff; border: none;
  padding: 8px 14px; border-radius: 50px;
  font-weight: 700; font-size: 12px; cursor: pointer;
  box-shadow: 0 3px 8px rgba(255,183,3,0.3);
}
.btn-eliminar {
  background: #ff5a6a;
  color: #fff; border: none;
  padding: 8px 12px; border-radius: 50px;
  font-weight: 700; font-size: 12px; cursor: pointer;
  margin-left: 6px;
}

/* MODAL */
.modal-overlay {
  position: fixed; inset: 0;
  background: rgba(90,24,154,0.35);
  backdrop-filter: blur(6px);
  display: none;
  justify-content: center; align-items: center;
  z-index: 9999;
}
.modal-contenido {
  background: #fffafc;
  width: 90%; max-width: 420px;
  border-radius: 22px;
  border: 3px solid #e0aaff;
  overflow: hidden;
  animation: pop 0.25s ease;
}
@keyframes pop { from { transform: scale(0.9); opacity: 0; } to { transform: scale(1); opacity: 1; } }
.modal-header {
  background: linear-gradient(90deg, #ff8fab, #c77dff, #7b2cbf);
  color: #fff; padding: 16px 20px;
  display: flex; justify-content: space-between; align-items: center;
}
.modal-cerrar { font-size: 28px; cursor: pointer; }
.modal-body { padding: 20px; display: flex; flex-direction: column; gap: 6px; }
.modal-body label { font-size: 12px; font-weight: 700; color: #7b2cbf; margin-top: 8px; }
.modal-body input, .modal-body select {
  padding: 12px 14px; border-radius: 12px;
  border: 2px solid #e0aaff; outline: none;
}
.modal-body input:focus, .modal-body select:focus {
  border-color: #7b2cbf; box-shadow: 0 0 0 3px rgba(199,125,255,0.2);
}
.modal-footer { padding: 0 20px 20px 20px; display: flex; gap: 10px; }
.btn-cancelar {
  flex: 1; padding: 12px; border-radius: 50px; border: 2px solid #e0aaff;
  background: #fff; color: #7b2cbf; font-weight: 700; cursor: pointer;
}
.btn-guardar-modal {
  flex: 1; padding: 12px; border-radius: 50px; border: none;
  background: linear-gradient(90deg, #c77dff, #7b2cbf);
  color: #fff; font-weight: 800; cursor: pointer;
}
</style>
</head>
<body>

<div class="caja-historial">
  <div class="interior-historial">
    <div class="titulo-historial">
      📋 Historial de Compras Realizadas
      <small>edita tus registros ✨</small>
    </div>

    <table class="tabla-historial" id="tabla">
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
        <tr>
          <td>Pedido #5</td>
          <td>Manuela</td>
          <td>🍪 Cheesecake de Oreo ×3</td>
          <td>$13.50</td>
          <td>tarjeta</td>
          <td>
            <button class="btn-editar">modificar</button>
            <button class="btn-eliminar" onclick="this.closest('tr').remove()">🗑️ Eliminar</button>
          </td>
        </tr>
        <tr>
          <td>Pedido #4</td>
          <td>kukencio</td>
          <td>🍮 Choco Flan ×1</td>
          <td>$4.20</td>
          <td>tarjeta</td>
          <td>
            <button class="btn-editar">modificar</button>
            <button class="btn-eliminar" onclick="this.closest('tr').remove()">🗑️ Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- MODAL -->
<div id="modalEditar" class="modal-overlay">
  <div class="modal-contenido">
    <div class="modal-header">
      <h3>✏️ Editar Pedido</h3>
      <span class="modal-cerrar" onclick="cerrarModal()">editar×</span>
    </div>
    <div class="modal-body">
      <label>Cliente</label>
      <input type="text" id="editCliente">
      <label>Pedido</label>
      <input type="text" id="editPedido">
      <label>Total</label>
      <input type="text" id="editTotal">
      <label>Pago</label>
      <select id="editPago">
        <option value="tarjeta">tarjeta</option>
        <option value="efectivo">efectivo</option>
        <option value="transferencia">transferencia</option>
      </select>
    </div>
    <div class="modal-footer">
      <button class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
      <button class="btn-guardar-modal" onclick="guardarEdicion()">Guardar</button>
    </div>
  </div>
</div>

<script>
let filaActual = null;

function abrirModal(btn) {
  filaActual = btn.closest('tr');
  const c = filaActual.querySelectorAll('td');
  document.getElementById('editCliente').value = c[1].innerText;
  document.getElementById('editPedido').value = c[2].innerText;
  document.getElementById('editTotal').value = c[3].innerText;
  document.getElementById('editPago').value = c[4].innerText.trim();
  document.getElementById('modalEditar').style.display = 'flex';
}

function cerrarModal() {
  document.getElementById('modalEditar').style.display = 'none';
}

function guardarEdicion() {
  const c = filaActual.querySelectorAll('td');
  c[1].innerText = document.getElementById('editCliente').value;
  c[2].innerText = document.getElementById('editPedido').value;
  c[3].innerText = document.getElementById('editTotal').value;
  c[4].innerText = document.getElementById('editPago').value;
  cerrarModal();
}

document.querySelectorAll('.btn-editar').forEach(b => {
  b.addEventListener('click', () => abrirModal(b));
});
</script>

</body>
</html>