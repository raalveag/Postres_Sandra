<?php
$paginaAnterior = "descripcion_proyecto.html";
$paginaSiguiente = "comprar.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Dulces Anhelo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(180deg, #fff5f9 0%, #ffeaf4 100%);
            font-family: 'Georgia', 'Times New Roman', serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px 20px;
        }

        .contenido {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        /* ENCABEZADO DECORADO */
        .encabezado {
            text-align: center;
            margin-bottom: 25px;
            position: relative;
        }

        .corona-icono {
            font-size: 70px;
            filter: drop-shadow(0 4px 6px rgba(139, 69, 19, 0.15));
            margin-bottom: 5px;
        }

        h1 {
            color: #8B4513;
            font-size: 52px;
            font-weight: normal;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(139, 69, 19, 0.1);
        }

        .subtitulo {
            color: #e84a80;
            font-size: 30px;
            margin: 8px 0 18px;
            font-style: italic;
            letter-spacing: 2px;
        }

        .decoracion-linea {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 10px 0 20px;
        }

        .linea-dorada {
            width: 140px;
            height: 3px;
            background: linear-gradient(to right, transparent, #d4a373, #b8860b, #d4a373, transparent);
            border-radius: 3px;
        }

        .punto-dorado {
            width: 12px;
            height: 12px;
            background: #d4a373;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(212, 163, 115, 0.6);
        }

        h2 {
            color: #8B4513;
            font-size: 34px;
            letter-spacing: 6px;
            margin-top: 5px;
            font-weight: normal;
            text-shadow: 1px 1px 3px rgba(139, 69, 19, 0.1);
        }

        /* TARJETA DE CONTACTO */
        .tarjeta-contacto {
            background: linear-gradient(145deg, #ffffff, #fff0f8);
            border: 4px solid transparent;
            border-image: linear-gradient(135deg, #d4a373, #b8860b, #d4a373) 1;
            border-radius: 16px;
            padding: 35px 45px;
            width: 100%;
            max-width: 540px;
            box-shadow: 
                0 8px 25px rgba(232, 74, 128, 0.12),
                0 4px 12px rgba(139, 69, 19, 0.1);
            position: relative;
            overflow: hidden;
        }

        .tarjeta-contacto::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #e84a80, #d4a373, #e84a80);
        }

        .fila {
            display: flex;
            align-items: center;
            margin: 16px 0;
            padding: 10px 0;
            border-bottom: 1px dashed #d4a37380;
            transition: transform 0.3s ease;
        }

        .fila:last-child {
            border-bottom: none;
        }

        .fila:hover {
            transform: translateX(8px);
        }

        .icono {
            width: 46px;
            height: 46px;
            background: linear-gradient(145deg, #f9e8d2, #f3d6b0);
            border: 2px solid #b8860b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 18px;
            font-size: 20px;
            box-shadow: 0 3px 8px rgba(139, 69, 19, 0.15);
            flex-shrink: 0;
        }

        .etiqueta {
            color: #e0246d;
            font-weight: bold;
            font-size: 21px;
            min-width: 100px;
            display: inline-block;
            letter-spacing: 1px;
        }

        .valor {
            color: #5c3a21;
            font-size: 19px;
            line-height: 1.6;
        }

        /* BOTONES HASTA ABAJO */
        .navegacion {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 540px;
            margin-top: auto;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .boton {
            padding: 14px 32px;
            background: linear-gradient(135deg, #d4a373, #b8860b);
            color: #fff;
            border: none;
            border-radius: 50px;
            font-size: 19px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.35s ease;
            box-shadow: 
                0 6px 15px rgba(184, 134, 11, 0.35),
                inset 0 1px 0 rgba(255,255,255,0.3);
            letter-spacing: 1px;
        }

        .boton:hover {
            background: linear-gradient(135deg, #e8bb88, #d4a373);
            transform: translateY(-4px);
            box-shadow: 
                0 10px 20px rgba(184, 134, 11, 0.4),
                inset 0 1px 0 rgba(255,255,255,0.4);
        }

        .boton.anterior {
            background: linear-gradient(135deg, #f098c0, #e84a80);
            box-shadow: 
                0 6px 15px rgba(232, 74, 128, 0.35),
                inset 0 1px 0 rgba(255,255,255,0.3);
        }

        .boton.anterior:hover {
            background: linear-gradient(135deg, #f5b8d4, #f05a90);
            box-shadow: 
                0 10px 20px rgba(232, 74, 128, 0.4),
                inset 0 1px 0 rgba(255,255,255,0.4);
        }
    </style>
</head>
<body>

    <div class="contenido">
        <div class="encabezado">
            <div class="corona-icono">🧁</div>
            <h1>Dulces Anhelo</h1>
            <p class="subtitulo">Repostería</p>
            <div class="decoracion-linea">
                <span class="linea-dorada"></span>
                <span class="punto-dorado"></span>
                <span class="linea-dorada"></span>
            </div>
            <h2>✿ CONTACTO ✿</h2>
        </div>

        <div class="tarjeta-contacto">
            <div class="fila">
                <div class="icono">👤</div>
                <span class="etiqueta">Nombre:</span>
                <span class="valor">Dulce Anhelo</span>
            </div>
            <div class="fila">
                <div class="icono">📞</div>
                <span class="etiqueta">Teléfono:</span>
                <span class="valor">2831302639</span>
            </div>
            <div class="fila">
                <div class="icono">💬</div>
                <span class="etiqueta">WhatsApp:</span>
                <span class="valor">2871312539</span>
            </div>
            <div class="fila">
                <div class="icono">📷</div>
                <span class="etiqueta">Instagram:</span>
                <span class="valor">dulceanhelo_postres</span>
            </div>
            <div class="fila">
                <div class="icono">📍</div>
                <span class="etiqueta">Dirección:</span>
                <span class="valor">Av. Ocampos Valle Nacional.</span>
            </div>
        </div>

        <div class="navegacion">
            <a href="<?php echo $paginaAnterior; ?>" class="boton anterior">⬅ Anterior</a>
            <a href="<?php echo $paginaSiguiente; ?>" class="boton">Siguiente ➡</a>
        </div>
    </div>

</body>
</html>