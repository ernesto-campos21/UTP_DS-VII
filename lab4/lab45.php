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
            $nmod = $n%2;  
        }

        if(array_key_exists('enviar', $_POST) && $nmod == 0)  
        {
           $matriz = array();
           $ctrl = 1;


           for($i = 0; $i < $n; $i++)
           {
                for($j = 0; $j < $n; $j++)
                {               
                    $matriz[$i][$j] = 0;
                }
           }

           for($i = 0; $i < $n; $i++)
           {
                $matriz[$i][$i] = 1;
           }

           for($i = 0; $i < $n; $i++)
           {
                for($j = 0; $j < $n; $j++)
                {
                    if($matriz[$i][$j] <= 9 || $matriz[$i][$j] >= 100)
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

           ?>
                <a href = "lab45.php">Volver</a>
           <?php
        }
        else
        {
            if(array_key_exists('enviar', $_POST) && $nmod == 1){
                echo "<h2>Debe colocar un numero que sea par</h2>";
            }
            ?>
            <form action="lab45.php" method = "post">
                Ingrese N numero: <input type = "text" name = "n_num"><br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
           
        }
        ?>
    </form>
</body>
</html>