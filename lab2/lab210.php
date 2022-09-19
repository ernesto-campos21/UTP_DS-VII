<!DOCTYPE html>
<html lang="es">
<head>
    <title>laboratorio 2.6</title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php
        $persona = array (
            array("nombre" => "Rosa", "estatura" => 168, "sexo" => "F"),
            array("nombre" => "Ignacion", "estatura" => 172, "sexo" => "M"),
            array("nombre" => "Daniel", "estatura" => 175, "sexo" => "M"),
            array("nombre" => "Ruben", "estatura" => 182, "sexo" => "M"),
        );

        echo "<b>DATOS SOBRE EL PERSONAL<b><br><hr>";

        $numPersonas = count($persona);

        for($i = 0; $i < $numPersonas; $i++)
        {
            echo "Nombre: <b>", $persona[$i]['nombre'], "</b><br>";
            echo "Estatura: <b>", $persona[$i]['estatura'], "cm</b><br>";
            echo "Sexo: <b>", $persona[$i]['sexo'], "</b><br>";
        }
    ?>
    
</body>
</html>