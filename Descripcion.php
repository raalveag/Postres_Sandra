<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descripción - Postres Sandra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 🔹 19. Color en la página */
        body {
            background-color: #cda6ff;
            background-image: url('Screenshot_20250505_094353_Chrome.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .contenedor-principal {
            display: flex;
            gap: 25px;
            align-items: flex-start;
            max-width: 1200px;
            margin: auto;
            flex-wrap: wrap;
        }

        /* 🔹 9. MENÚ VERTICAL (igual que en menu.php) */
        .menu-vertical {
            background-color: #6f42c1;
            padding: 20px 12px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            min-width: 180px;
            position: sticky;
            top: 20px;
        }
        .menu-vertical a {
            display: block;
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 14px 16px;
            margin: 8px 0;
            border-radius: 6px;
            transition: background 0.3s;
            text-align: center;
        }
        .menu-vertical a:hover {
            background-color: #9067e0;
        }

        .contenido {
            flex: 1;
            min-width: 300px;
        }

        .card {
            background-color: #f6e0ff;
            border: none;
            box-shadow: 0 2px 10px rgba(120, 20, 120, 0.3);
        }

        /* 🔹 20. Botón personalizado */
        .boton-regresar {
            background-color: #6f42c1;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
        }
        .boton-regresar:hover {
            background-color: #9067e0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="contenedor-principal">
        <!-- 🔹 9. MENÚ VERTICAL PRINCIPAL -->
        <div class="menu-vertical">
            <a href="menu.php">🏠 Inicio</a>
            <a href="clientes.php">👥 Clientes</a>
            <a href="productos.php">🍰 Productos</a>
            <a href="empleado.php">👔 Empleados</a>
            <a href="proveedor.php">🚚 Proveedores</a>
            <a href="pedido.php">📦 Pedidos</a>
            <a href="empresa.php">🏢 La Empresa</a>
            <a href="Descripcion.php">📋 Descripción</a>
        </div>

        <div class="contenido">
            <!-- 🔹 11. Enlace para regresar al menú -->
            <p class="text-end">
                <a href="menu.php" class="text-decoration-none fw-bold" style="color:#6f42c1;">↩️ Regresar al menú principal</a>
            </p>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <h2 class="fw-bold" style="color: #fff;">BIENVENIDA A POSTRES SANDRA</h2>
                    </div>
                </div>

                <!-- 🔹 12. Descripción del Proyecto -->
                <div class="card mb-4 p-3">
                    <h4 class="text-center text-primary">Descripción del Sistema</h4>
                    <!-- 🔹 18. Etiquetas: párrafo, negrita, cursiva, subrayado -->
                    <p>
                        Este sistema web <strong>Postres Sandra</strong> permite administrar de forma fácil, rápida y segura toda la información del negocio: gestión de <em>clientes</em>, control de <u>productos</u>, registro de <strong>empleados</strong>, relación con <em>proveedores</em>, procesamiento de <u>pedidos</u> y datos de la empresa. Todo conectado a una base de datos confiable para facilitar el trabajo diario.
                    </p>
                    <!-- 🔹 17. Línea separadora -->
                    <hr class="border border-2 border-primary rounded">

                    <!-- 🔹 13. Listas y sublistas ordenadas -->
                    <h5> Estructura de Funciones</h5>
                    <ol>
                        <li>Catálogos principales
                            <ol type="a">
                                <li>Altas, bajas y cambios</li>
                                <li>Consultas personalizadas</li>
                            </ol>
                        </li>
                        <li>Operaciones del sistema
                            <ol type="a">
                                <li>Procesamiento de ventas</li>
                                <li>Generación de reportes</li>
                            </ol>
                        </li>
                    </ol>

                    <!-- 🔹 14. Listas ordenadas y desordenadas -->
                    <h5> Ventajas</h5>
                    <ul>
                        <li>Diseño responsivo con Bootstrap</li>
                        <li>Colores amigables y claros</li>
                    </ul>
                    <ol start="3">
                        <li>Fácil navegación</li>
                        <li>Información segura</li>
                    </ol>

                    <!-- 🔹 15. Listas con definición -->
                    <h5>Conceptos Clave</h5>
                    <dl>
                        <dt><strong>Empleado</strong></dt>
                        <dd>Personal autorizado para operar el sistema.</dd>
                        <dt><strong>Proveedor</strong></dt>
                        <dd>Encargado de suministrar insumos frescos y de calidad.</dd>
                    </dl>

                    <!-- 🔹 16. Listas con viñetas -->
                    <h5> Compromiso</h5>
                    <ul style="list-style-type: square; color:#800080;">
                        <li>Mejora continua</li>
                        <li>Servicio confiable</li>
                        <li>Atención cálida</li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <img src="Screenshot_20250505_094137_Chrome.jpg" class="img-fluid rounded shadow" alt="Postres Sandra">
                    </div>
                    <div class="col-md-6">
                        <div class="card p-3">
                            <h4 class="card-title text-center text-primary">¿Quiénes Somos?</h4>
                            <p class="card-text">
                                <strong>Postres Sandra</strong> es una empresa dedicada a la elaboración y venta de postres <em>artesanales</em>. Nos especializamos en pasteles, pays, galletas y postres tradicionales <u>mexicanos</u>.
                            </p>
                            
                            <h5 class="mt-4 text-danger">Misión</h5>
                            <p>Endulzar los momentos especiales de nuestros clientes con postres frescos, 
                            elaborados con ingredientes selectos y mucho amor.</p>
                            
                            <h5 class="mt-4 text-danger">Visión</h5>
                            <p>Ser la repostería preferida en la región, reconocida por nuestra calidad, 
                            sabor inigualable y excelente servicio al cliente.</p>
                            
                            <h5 class="mt-4 text-danger">Valores</h5>
                            <ul style="list-style-type: circle;">
                                <li>Calidad en cada producto</li>
                                <li>Atención personalizada</li>
                                <li>Higiene y frescura</li>
                                <li>Puntualidad en entregas</li>
                                <li>Innovación constante</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 🔹 20. Botón para regresar al menú -->
                <div class="mt-4 text-center">
                    <a href="menu.php" class="boton-regresar">🔙 Regresar al menú principal</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>