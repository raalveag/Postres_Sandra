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
                        #fff0f5 0%, 
                        #ffe4ec 30%, 
                        #ffd6e0 60%, 
                        #ffc2d1 100%),
                        url('fondo.jpg');
            background-blend-mode: overlay;
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', 'Georgia', serif;
            color: #5a1a3d;
            min-height: 100vh;
        }
        header {
            background: linear-gradient(90deg, #ff6b9d, #ff85a2, #ff9e8f);
            padding: 22px 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 6px 30px rgba(255, 107, 157, 0.35),
                        0 0 0 3px #fff,
                        0 0 40px rgba(255, 215, 0, 0.25) inset;
            border-bottom: 4px solid #ffd700;
            position: sticky;
            top: 0;
            z-index: 100;
            animation: brilloDorado 3s ease-in-out infinite alternate;
            border-radius: 0 0 30px 30px;
        }
        @keyframes brilloDorado {
            from { box-shadow: 0 6px 30px rgba(255, 107, 157, 0.35), 0 0 0 3px #fff, 0 0 40px rgba(255, 215, 0, 0.25) inset; }
            to   { box-shadow: 0 6px 35px rgba(255, 107, 157, 0.45), 0 0 0 3px #fff, 0 0 60px rgba(255, 215, 0, 0.4) inset, 0 0 80px rgba(255, 215, 0, 0.15); }
        }
        .logo {
            font-size: 34px;
            font-weight: 900;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 12px;
            text-shadow: 0 2px 4px rgba(90, 26, 61, 0.3),
                         0 0 10px rgba(255, 215, 0, 0.6),
                         0 0 20px rgba(255, 215, 0, 0.3);
            letter-spacing: 2px;
            transition: all 0.4s ease;
        }
        .logo:hover {
            transform: scale(1.08) rotate(-2deg);
            filter: drop-shadow(0 0 12px gold);
        }
        nav {
            display: flex;
            gap: 10px;
        }
        nav a {
            background: linear-gradient(180deg, #fff, #fff8dc);
            color: #b3446c;
            text-decoration: none;
            padding: 14px 26px;
            font-weight: 800;
            border-radius: 25px 25px 0 0;
            border: 3px solid #ffd700;
            border-bottom: none;
            transition: all 0.35s ease;
        }
        nav a:nth-child(2) { background: linear-gradient(180deg, #ffe4ec, #ffb6c1); color: #8b2e54; border-color: #ffc107; }
        nav a:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.35);
        }
        main {
            background: linear-gradient(145deg, rgba(255, 250, 240, 0.96), rgba(255, 240, 245, 0.94));
            margin: 40px auto;
            padding: 50px;
            max-width: 1150px;
            border-radius: 40px;
            box-shadow: 0 15px 50px rgba(255, 107, 157, 0.25),
                        0 0 0 4px #fff;
            border: 4px solid transparent;
            border-image: linear-gradient(90deg, #ff6b9d, #ffd700, #ff85a2, #ffd700, #ff6b9d) 1;
            animation: aparecer 1s ease-out;
        }
        @keyframes aparecer {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        .titulo-seccion {
            text-align: center;
            margin-bottom: 50px;
            padding-bottom: 30px;
            border-bottom: 3px dashed #ffd700;
        }
        .titulo-seccion h2 {
            font-size: 36px;
            background: linear-gradient(90deg, #d4af37, #ff6b9d, #b8860b, #ff85a2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            letter-spacing: 4px;
            font-weight: 900;
        }
        .titulo-seccion p {
            font-size: 20px;
            color: #b3446c;
            font-style: italic;
        }
        h2.subtitulo {
            text-align: center;
            margin: 10px 0 45px;
            font-size: 30px;
            color: #8b4513;
            text-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
        }
        h2.subtitulo::before,
        h2.subtitulo::after {
            content: '✨ 🏆 ✨';
            margin: 0 15px;
        }
        .contenedor-postres {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }
        .tarjeta-postre {
            background: linear-gradient(145deg, #fffafc, #fff5f8);
            border-radius: 30px;
            padding: 35px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 12px 30px rgba(255, 182, 193, 0.3),
                        inset 0 0 25px rgba(255, 255, 255, 0.9);
            border: 4px solid;
            border-image: linear-gradient(135deg, #ffd700, #ffec8b, #ffd700, #ffb347) 1;
            transition: all 0.45s ease;
            position: relative;
            overflow: hidden;
        }
        .tarjeta-postre::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.18), transparent 60%);
            opacity: 0;
            transition: all 0.5s ease;
            pointer-events: none;
        }
        .tarjeta-postre:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: 0 22px 45px rgba(255, 107, 157, 0.3),
                        0 0 30px rgba(255, 215, 0, 0.25);
        }
        .tarjeta-postre:hover::before {
            opacity: 1;
        }
        .tarjeta-postre img {
            width: 180px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 20px;
            border-radius: 15px;
            border: 3px solid #ffd700;
            padding: 5px;
            background: #fff;
            transition: all 0.4s ease;
        }
        .tarjeta-postre:hover img {
            transform: scale(1.15) rotate(5deg);
            filter: drop-shadow(0 10px 20px rgba(255, 215, 0, 0.5));
        }
        .tarjeta-postre h3 {
            font-size: 23px;
            background: linear-gradient(90deg, #b8860b, #d4af37, #ff6b9d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
            font-weight: 900;
        }
        .tarjeta-postre p {
            font-size: 15px;
            line-height: 1.75;
            color: #704255;
            margin-bottom: 22px;
        }
        .btn-comprar {
            display: inline-block;
            background: linear-gradient(90deg, #ffc107, #ffb347, #ff6b9d);
            color: #4a2c2a;
            padding: 12px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 900;
            font-size: 16px;
            border: 3px solid #fff;
            box-shadow: 0 6px 18px rgba(255, 193, 7, 0.4);
            transition: all 0.35s ease;
            letter-spacing: 1px;
        }
        .btn-comprar:hover {
            transform: translateY(-5px) scale(1.08);
            box-shadow: 0 12px 30px rgba(255, 107, 157, 0.4),
                        0 0 20px rgba(255, 215, 0, 0.35);
        }

        /* 🎀 Botones de Navegación Anterior / Siguiente */
        .navegacion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 3px dashed #ffd700;
        }
        .btn-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: linear-gradient(90deg, #fff, #fff8dc);
            color: #b3446c;
            text-decoration: none;
            font-weight: 900;
            font-size: 17px;
            border-radius: 50px;
            border: 3px solid #ffd700;
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.25),
                        inset 0 0 15px rgba(255, 255, 255, 0.9);
            transition: all 0.4s ease;
            letter-spacing: 1px;
        }
        .btn-nav:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 12px 30px rgba(255, 107, 157, 0.35),
                        0 0 25px rgba(255, 215, 0, 0.3);
            background: linear-gradient(90deg, #fff8dc, #ffe4ec, #ffd9e8);
        }
        .btn-siguiente {
            flex-direction: row-reverse;
        }

        @media (max-width: 768px) {
            .contenedor-postres { grid-template-columns: 1fr; }
            header { flex-direction: column; gap: 18px; }
            .navegacion { flex-direction: column; gap: 18px; }
        }
    </style>
</head>
<body>
    <main>
        <div class="titulo-seccion">
            <h2>✨ 🌸 MENÚ DE POSTRES 🌸 ✨</h2>
            <p>🍓 Postres artesanales, hechos para ti con todo el brillo y el cariño dorado 💛✨</p>
        </div>
        <h2 class="subtitulo">Nuestros Postres</h2>
        <div class="contenedor-postres">
            <!-- 🧁 Cupcake de Vainilla -->
            <div class="tarjeta-postre">
                <img src="1.jpeg" alt="Cupcake de Vainilla">
                <h3>🧁 Cupcake de Vainilla</h3>
                <p>Esponjoso y suave cupcake preparado con vainilla natural de la más alta calidad. Cubierto con un glaseado de crema mantequilla de textura ligera y decorado con coloridos granitos de azúcar.</p>
                <a href="comprar.php?producto=Cupcake%20de%20Vainilla" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍓 Cheesecake de Fresa -->
            <div class="tarjeta-postre">
                <img src="34.jpeg" alt="Cheesecake de Fresa">
                <h3>🍓 Cheesecake de Fresa</h3>
                <p>Deliciosa tarta de queso con una textura cremosa y suave, preparada al estilo tradicional. Lleva una base crujiente de galleta y se cubre con una capa generosa de salsa de fresas naturales, hecha en casa sin conservadores.</p>
                <a href="comprar.php?producto=Cheesecake%20de%20Fresa" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍪 Cheesecake de Oreo -->
            <div class="tarjeta-postre">
                <img src="3.jpeg" alt="Cheesecake de Oreo">
                <h3>🍪 Cheesecake de Oreo</h3>
                <p>Irresistible combinación de queso cremoso con trocitos de galleta de cacao. Su base es de galleta triturada mezclada con mantequilla, y el relleno integra trozos crujientes que contrastan con su suavidad.</p>
                <a href="comprar.php?producto=Cheesecake%20de%20Oreo" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍫 Brownie de Chocolate -->
            <div class="tarjeta-postre">
                <img src="4.jpeg" alt="Brownie de Chocolate">
                <h3>🍫 Brownie de Chocolate</h3>
                <p>Postre denso y jugoso, preparado con chocolate de alta calidad y un toque de nuez. Su interior es suave y ligeramente fundente, mientras que su superficie tiene una capa fina y crujiente.</p>
                <a href="comprar.php?producto=Brownie%20de%20Chocolate" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🎂 Pastel -->
            <div class="tarjeta-postre">
                <img src="5.jpeg" alt="Pastel">
                <h3>🎂 Pastel</h3>
                <p>Exquisito pastel esponjoso, preparado con receta familiar y mucho amor. Disponible en variedad de sabores y decoraciones. Suave, esponjoso y con el dulzor perfecto para celebrar cualquier ocasión especial.</p>
                <a href="comprar.php?producto=Pastel" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🥐 Roles -->
            <div class="tarjeta-postre">
                <img src="6.jpeg" alt="Roles">
                <h3>🥐 Roles</h3>
                <p>Deliciosos rollos dulces de masa suave y esponjosa, horneados hasta quedar doraditos. Se sirven cubiertos con un glaseado dulce y suave que los hace irresistibles. Perfectos para acompañar en la merienda.</p>
                <a href="comprar.php?producto=Roles" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍮 Choco Flan -->
            <div class="tarjeta-postre">
                <img src="ch.jpeg" alt="Choco Flan">
                <h3>🍮 Choco Flan</h3>
                <p>La combinación perfecta: una capa de suave flan de vainilla sobre un delicioso y esponjoso pastel de chocolate. Al hornearse juntos se entrelazan creando una textura única y un sabor espectacular.</p>
                <a href="comprar.php?producto=Choco%20Flan" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🫐 Panqueque de Arándano -->
            <div class="tarjeta-postre">
                <img src="a.jpeg" alt="Panqueque de Arándano">
                <h3>🫐 Panqueque de Arándano</h3>
                <p>Esponjosos panqueques caseros servidos con arándanos frescos, miel de maple y un toque de azúcar glass. Los arándanos aportan frescura y un toque ácido que equilibra perfectamente el dulzor de la masa.</p>
                <a href="comprar.php?producto=Panqueque%20de%20Arándano" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍓 Panqueque de Fresa -->
            <div class="tarjeta-postre">
                <img src="f.jpeg" alt="Panqueque de Fresa">
                <h3>🍓 Panqueque de Fresa</h3>
                <p>Suaves y esponjosos panqueques acompañados con fresas frescas en trozos, crema batida y un toque de miel. Las fresas aportan jugosidad y frescura, creando un postre colorido y lleno de sabor natural.</p>
                <a href="comprar.php?producto=Panqueque%20de%20Fresa" class="btn-comprar">🛒 Comprar</a>
            </div>
            <!-- 🍩 Donas Glaseadas -->
            <div class="tarjeta-postre">
                <img src="d.jpg" alt="Donas Glaseadas">
                <h3>🍩 Donas Glaseadas</h3>
                <p>Suaves y esponjosas donas recién horneadas, cubiertas con glaseado dulce y decoradas con granitos de colores. Un clásico que nunca pasa de moda, perfecto para acompañar en cualquier momento del día.</p>
                <a href="comprar.php?producto=Donas%20Glaseadas" class="btn-comprar">🛒 Comprar</a>
            </div>
        </div>

        <!-- 🎀 Botones de Navegación -->
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