<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 4.2</title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php

        if(array_key_exists('enviar', $_POST))
        {
            $n = $_REQUEST['n_fac'];
            $factorial = 1;
            
            for($i = 1; $i <= $n; $i++)
            {
                $factorial *= $i;
            }

            echo "El factorial de $n es: $factorial"; 
            ?>
            <br>
            <a href="lab42.php">
                <button>Volver</button>
            </a> 
            
            <?php
        }
        else
        {
            ?>
            <form action="lab42.php" method = "post">
                Ingrese el numero a calcular el factorial: <input type = "text" name = "n_fac"><br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
        }
        ?>
    
</body>
</html>