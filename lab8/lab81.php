<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 8.1</title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php

        if(array_key_exists('enviar', $_POST))
        {
            include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
            $n = $_REQUEST['n_fac'];
            
            $fac = new Factorial($n);
            

            echo "El factorial de $n es: ". $fac->obtenerFactorial(); 
            ?>
            <br>
            <a href="lab81.php">
                <button>Volver</button>
            </a> 
            
            <?php
        }
        else
        {
            ?>
            <form action="lab81.php" method = "post">
                Ingrese el numero a calcular el factorial: <input type = "text" name = "n_fac"><br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
        }
        ?>
    
</body>
</html>