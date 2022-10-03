<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 8.2 </title>
    <meta charset = "UTF-8">
</head>
<body>
    <?php
        include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
        $arr = new NumeroMayor();

        $arr->cargarArreglo();

        echo "<b>Numeros generados y cargados aleatoreamente<b><br>";

        echo "Estos fueron los numeros generados: <br>";
        $arr->mostrarArreglo();

        $indice = $arr->buscarMayor();

        echo "Posicion del numero mayor en el arreglo #$indice <br>";



        
    ?>
    
</body>
</html>