<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 4.3 </title>
    <meta charset = "UTF-8">
</head>
<body>
    <?php
        $arreglo[20] = 0;
        

        for($i = 0; $i < 20; $i++)
        {
            $arreglo[$i] = rand(1, 100);
        }

        echo "<b>Numeros generados y cargados aleatoreamente<b><br>";

        echo "Estos fueron los numeros generados: <br>";
        for($i = 0; $i < 20; $i++)
        {
            echo "Posicion #$i con el valor: $arreglo[$i] <br>";
        }

        $mayor = $arreglo[0];
        for($i = 0; $i < 20; $i++)
        {
            if($arreglo[$i] > $mayor)
            {
                $mayor = $arreglo[$i];
                $indice = $i;
            }
        }

        echo "Posicion del numero mayor en el arreglo #$indice con el valor: $mayor <br>";



        
    ?>
    
</body>
</html>