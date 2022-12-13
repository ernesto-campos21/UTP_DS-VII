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

        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" th:href="@{css/style.css}">
</head>
<body>
    <?php
    //Sesión Iniciada
        if(isset($_SESSION{'usuario_valido'})){
            session_destroy();
            print("<br><br>\n");
            print("<p align='center'>Conexion finalizada</p>");
            print("<p align='center'>[ <a href='index.php'>Conectar</a> ]</p>\n");
        }else{
                print("<br><br>\n");
                print("<p align='center'>No existe una conexion activa</p>");
                print("<p align='center'>[ <a href='index.php'>Conectar</a> ]</p>\n");
        }
    ?>
</body>
</html>