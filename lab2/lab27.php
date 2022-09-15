<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 2.7</title>
    <meta charset = "UTF-8">
</head>
<body>
    <?php
        $posicion = "arriba";

        switch($posicion)
        {
            case "arriba": //Bloque 1
                echo "La variable contiene ";
                echo "el valor arriba";
                break;
            
            case "abajo": //Bloque 2
                echo "La variable contiene ";
                echo "el valor abajo";
                break;

            default: //Bloque 3
                echo "La variable contiene otro valor ";
                echo "distinto de arriba y abajo";
                break;
        }
    ?>
    
</body>
</html>