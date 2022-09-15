<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 2.4</title>
</head>
<body>
    <?php
        //creacion del arreglo array("clave" => "valor")
        $personas = array("Juan" => "Panama",
        "John" => "USA",
        "Eica" => "Finlandia",
        "kusanagi" => "Japon");

        //Recorrer todo el arreglo
        foreach($personas as $persona => $pais){
            print "$persona es de $pais<br>";
        }

        //Impresion especifica
        echo "<br>".$personas["Juan"];
        echo "<br>".$personas["Eica"];
    ?>
    
</body>
</html>