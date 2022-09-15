<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 2.5</title>
</head>
<body>
    <?php
        $figuras = array('cuadrado', 'triangulo', 'circulo');
        $figuras[1] = 'rectangulo';
        mostrar_figuras($figuras, "asigancion de rectangulo");
        
        array_push($figuras, 'pentagono');
        mostrar_figuras($figuras, "asigancion de pentagono al final");

        array_unshift($figuras, 'hexagono');
        mostrar_figuras($figuras, "asigancion de hexagono al inicio");

        array_pop($figuras);
        mostrar_figuras($figuras, "eliminacion del ultimo");

        array_shift($figuras);
        mostrar_figuras($figuras, "eliminacion del primero");

        function mostrar_figuras($figuras, $mensaje)
        {
            echo "<br>Arreglo despues de $mensaje <br>";
            foreach($figuras as $figura)
            {
                echo "$figura <br>";
            }
        }

    ?>
    
</body>
</html>