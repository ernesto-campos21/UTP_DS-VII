<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 4.1</title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php

        if(array_key_exists('enviar', $_POST))
        {
            if($_REQUEST['valor_ventas'] >= 80)
            {
                echo "El porcentaje de ventas ingresado fue: $_REQUEST[valor_ventas]% <br>"; ?>
                <img src="verde.jpg" alt="Excelente"> <?php
            }
            else
            {
                if($_REQUEST['valor_ventas'] >= 50 && $_REQUEST['valor_ventas'] <= 79)
                {
                    echo "El porcentaje de ventas ingresado fue: $_REQUEST[valor_ventas]% <br>";?>
                    <img src="amarillo.jpg" alt="Puede ser mejor"><?php
                }
                else
                {
                    echo "El porcentaje de ventas ingresado fue: $_REQUEST[valor_ventas]% <br>";?>
                    <img src="rojo.jpg" alt="Muy mal"><?php
                }
            }       
        }
        else
        {
            ?>
            <form action="lab41.php" method = "post">
                Ingrese el valor en porcentaje de las ventas: <input type = "text" name = "valor_ventas">%<br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
        }
        ?>
    
</body>
</html>