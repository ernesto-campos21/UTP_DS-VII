<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconectar</title>
</head>
<body>
    <?php
    //Sesión Iniciada
        if(isset($_SESSION{'usuario_valido'})){
            session_destroy();
            print("<br><br>\n");
            print("<p align='center'>Conexion finalizada</p>");
            print("<p align='center'>[ <a href='login.php'>Conectar</a> ]</p>\n");
        }else{
                print("<br><br>\n");
                print("<p align='center'>No existe una conexion activa</p>");
                print("<p align='center'>[ <a href='login.php'>Conectar</a> ]</p>\n");
        }
    ?>
</body>
</html>