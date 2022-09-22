<!DOCTYPE html>
<html lang="es">
<head>
    <title>Parcial 1 - Ernesto Campos </title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php

        if(array_key_exists('enviar', $_POST))
        {
           $n = $_POST['n_num'];
           $matriz = array();
           $ctrl = round($n/2) - 1;
           $sum_h = 0;
           $sum_v = 0;


           for($i = 0; $i < $n; $i++)
           {
                for($j = 0; $j < $n; $j++)
                {
                
                    $matriz[$i][$j] = 0;
                }
           }

           for($i = 0; $i < $n; $i++)
           {
                for($j = 0; $j < $n; $j++)
                {
                    if($j == $ctrl)
                    {
                        $matriz[$i][$j] = rand(1, 100);
                        $matriz[$j][$i] = rand(1, 100);

                        $sum_v += $matriz[$i][$j];
                        $sum_h += $matriz[$j][$i];
                    }     
                }
           }

           for($i = 0; $i < $n; $i++)
           {
                for($j = 0; $j < $n; $j++)
                {
                    if($matriz[$i][$j] <= 9)
                    {
                        echo $matriz[$i][$j]."&nbsp &nbsp &nbsp &nbsp &nbsp";
                    }
                    else
                    {
                        echo $matriz[$i][$j]."&nbsp &nbsp &nbsp &nbsp";
                    }
                    
                }
                echo "<br>";
           }

           echo "<br><br><h2>La suma de los valores de la columna del medio es: ".$sum_v;
           echo "<br><br><h2>La suma de los valores de la fila del medio es: ".$sum_h;


        }
        else
        {
            ?>
            <form action="parcial1.php" method = "post">
                Ingrese N numero: <input type = "text" name = "n_num"><br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
        }
        ?>
    </form>
</body>
</html>