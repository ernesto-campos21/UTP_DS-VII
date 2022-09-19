<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 3.3</title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php

        if(array_key_exists('enviar', $_POST))
        {
            if($_REQUEST['Apellido'] != "")
            {
                echo "El apellido Ingresado es: $_REQUEST[Apellido]";
            }
            else
            {
                echo "favor coloque el apellido";
            }

            echo "<br>";

            if($_REQUEST['Nombre'] != "")
            {
                echo "El noombre Ingresado es: $_REQUEST[Nombre]";
            }
            else
            {
                echo "favor coloque el nombre";
            }
        }
        else
        {
            ?>
            <form action="lab33.php" method = "post">
                Nombre: <input type = "text" name = "Nombre"><br>
                Apellido: <input type = "text" name = "Apellido"><br>
                <input type = "submit" name = "enviar" value = "Enviar datos">
            </form>
            <?php
        }
        ?>
    
</body>
</html>