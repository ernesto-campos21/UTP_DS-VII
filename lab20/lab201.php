<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 20</title>
</head>
<body>
    <form action="lab201.php" method = "post">
        Nombre: <input type="text" name="nombre" id="" required><br>
        Apellido: <input type="text" name="apellido" id="" required><br>
        Email: <input type="email" name="email" id=""><br>
        Edad: <input type="number" name="edad" id="" min="0" max="120"><br><br>
        <input type="submit" value="Guardar Datos" name="guardar"> 
    </form>

    <?php
        include("UsuariosMDB.php");
        $usrs = new UsuariosMDB();

        if(array_key_exists('guardar', $_POST)){
            $usrs -> insertarRegistro($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['email'], $_REQUEST['edad']);
            echo "Registro insertado exitosamente <br><br>";
        }

        echo "Registros en la colección usuarios: <br>";
        $usrs->obtenerRegistros();
    ?>
</body>
</html>