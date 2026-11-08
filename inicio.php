<?php
// Puedes agregar tu lógica PHP aquí cuando la necesites 💜
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>💜 Dulce Anhelo 💜 Menú</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, 
                        rgba(255, 182, 225, 0.45), 
                        rgba(218, 112, 214, 0.4), 
                        rgba(186, 85, 211, 0.35)),
                        url('fondo.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', 'Georgia', sans-serif;
            color: #4b006e;
            min-height: 100vh;
        }
        /* Barra de navegación IGUAL a tu captura */
        header {
            background: linear-gradient(90deg, #ff88a0, #ffc850);
            padding: 12px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 0 0 25px 25px;
            border-bottom: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo {
            font-size: 28px;
            font-weight: 900;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
            text-shadow: 2px 2px 4px rgba(255, 105, 180, 0.3);
            letter-spacing: 1px;
        }
        /* ✅ Todos en fila horizontal SIEMPRE */
        nav {
            display: flex;
            flex-direction: row !important;
            align-items: flex-end;
            gap: 5px;
            flex-wrap: nowrap !important;
        }
        /* Estilo de cada botón — IGUAL a tu imagen */
        nav a {
            background: #fff;
            color: #b72080;
            text-decoration: none;
            padding: 10px 18px;
            font-weight: 600;
            border-radius: 18px 18px 0 0;
            border: 3px solid #fff;
            border-bottom: none;
            font-size: 14px;
            white-space: nowrap;
            transition: all 0.35s ease;
        }
        nav a:hover {
            transform: scale(1.08);
        }
        /* Inicio */
        nav a:nth-child(1) { background: #fff5f8; color: #d81b60; }
        /* Menú — ACTIVO */
        nav a:nth-child(2) { background: #ffe6eb; color: #ad1457; font-weight: 800; }
        /* Nosotros */
        nav a:nth-child(3) { background: #fcf4ff; color: #7b1fa2; }
        /* Contacto */
        nav a:nth-child(4) { background: #fff9fb; color: #880e4f; }
        /* Comprar y Pagar */
        nav a:nth-child(5) { background: #fffdf5; color: #b71c1c; }
        /* Contenido */
        main {
            background: linear-gradient(145deg, rgba(255, 240, 250, 0.92), rgba(240, 220, 255, 0.9));
            margin: 35px auto;
            padding: 45px;
            max-width: 1100px;
            border-radius: 30px;
            box-shadow: 0 12px 45px rgba(153, 50, 204, 0.25),
                        inset 0 0 30px rgba(255, 182, 193, 0.3);
            border: 4px solid transparent;
            border-image: linear-gradient(90deg, #ff69b4, #da70d6, #9932cc) 1;
        }
        .titulo-seccion {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 25px;
            border-bottom: 3px dashed #da70d6;
        }
        .titulo-seccion h2 {
            font-size: 34px;
            background: linear-gradient(90deg, #ff1493, #9932cc, #800080);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
            letter-spacing: 3px;
        }
        .titulo-seccion p {
            font-size: 21px;
            font-style: italic;
            color: #c71585;
        }
        .contenedor-postres {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 35px;
        }
        .tarjeta-postre {
            background: linear-gradient(145deg, #fce4f7, #f3e5ff);
            border-radius: 25px;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 10px 25px rgba(186, 85, 211, 0.2),
                        inset 0 0 20px rgba(255, 255, 255, 0.6);
            border: 4px solid;
            border-image: linear-gradient(135deg, #ffb6c1, #da70d6, #ba55d3) 1;
            transition: transform 0.35s ease;
        }
        .tarjeta-postre:hover {
            transform: scale(1.03);
        }
        .tarjeta-postre img {
            width: 170px;
            height: 145px;
            object-fit: contain;
            margin-bottom: 18px;
        }
        .tarjeta-postre h3 {
            font-size: 23px;
            background: linear-gradient(90deg, #c71585, #9932cc, #800080);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
        }
        .tarjeta-postre p {
            font-size: 15px;
            line-height: 1.7;
            color: #6a0dad;
            margin-bottom: 20px;
        }
        .btn-ver-producto {
            display: inline-block;
            background: linear-gradient(90deg, #ff69b4, #da70d6, #9932cc);
            color: #fff;
            padding: 11px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 800;
            border: 3px solid #fff;
            box-shadow: 0 5px 15px rgba(153, 50, 204, 0.3);
            transition: all 0.35s ease;
        }
        .btn-ver-producto:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 22px rgba(153, 50, 204, 0.4);
        }

        /* 💜 BOTONES ANTERIOR Y SIGUIENTE CON EFECTO ZOOM */
        .navegacion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 3px dashed #da70d6;
        }
        .btn-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, #fff5f8, #fcf4ff);
            color: #7b1fa2;
            text-decoration: none;
            padding: 12px 25px;
            font-weight: 800;
            border-radius: 50px;
            border: 3px solid #fff;
            box-shadow: 0 5px 15px rgba(186, 85, 211, 0.25),
                        inset 0 0 15px rgba(255, 255, 255, 0.7);
            transition: all 0.35s ease; /* ✅ Suavidad del efecto */
            font-size: 15px;
        }
        .btn-nav:hover {
            transform: scale(1.1); /* ✅ EFECTO ZOOM — se agranda al pasar el ratón */
            box-shadow: 0 10px 25px rgba(218, 112, 214, 0.35);
        }
        .btn-siguiente {
            flex-direction: row-reverse;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            🏪 Dulce Anhelo ✨
        </div>
        <nav>
            <a href="inicio.php">🌸 Inicio</a>
            <a href="menu.php">🍰 Menú</a>
            <a href="descripcion_proyecto.html">💜 Nosotros</a>
            <a href="contacto.php">💌 Contacto</a>
            <a href="comprar.php">🛒 Comprar y Pagar</a>
        </nav>
    </header>
    <main>
        <div class="titulo-seccion">
            <h2>✨ 🌸 POSTRES DESTACADOS 🌸 ✨</h2>
            <p>🍓 Postres artesanales, hechos para ti diariamente.<br>💖 Hechos con todo mi amor 💖</p>
        </div>
        <div class="contenedor-postres">
            <div class="tarjeta-postre">
                <img src="a.jpeg" alt="Panqueque de arándano">
                <h3>🥞 Panqueque de Arándano</h3>
                <p>Esponjosos panqueques servidos con arándanos frescos, miel de maple y un toque de azúcar glass.</p>
                <a href="menu.php" class="btn-ver-producto">👁️ Ver Producto</a>
            </div>
            <div class="tarjeta-postre">
                <img src="1.jpeg" alt="Cupcake de vainilla">
                <h3>🧁 Cupcake de Vainilla</h3>
                <p>Cupcake esponjoso de vainilla con suave buttercream y coloridos sprinkles.</p>
                <a href="menu.php" class="btn-ver-producto">👁️ Ver Producto</a>
            </div>
            <div class="tarjeta-postre">
                <img src="4.jpeg" alt="Brownie de chocolate">
                <h3>🍫 Brownie de Chocolate</h3>
                <p>Brownie intenso de chocolate 70% cacao, con nuez crujiente y chispas de chocolate.</p>
                <a href="menu.php" class="btn-ver-producto">👁️ Ver Producto</a>
            </div>
            <div class="tarjeta-postre">
                <img src="34.jpeg" alt="Cheesecake de fresa">
                <h3>🍓 Cheesecake de Fresa</h3>
                <p>Cheesecake cremoso con salsa de fresa natural y crujiente base de galleta.</p>
                <a href="menu.php" class="btn-ver-producto">👁️ Ver Producto</a>
            </div>
        </div>

        <!-- 💜 BOTONES ANTERIOR Y SIGUIENTE CON ZOOM -->
        <div class="navegacion">
            <a href="inicio.php" class="btn-nav btn-anterior">
                ← Anterior
            </a>
            <a href="descripcion_proyecto.html" class="btn-nav btn-siguiente">
                Siguiente →
            </a>
        </div>
    </main>
</body>
</html>