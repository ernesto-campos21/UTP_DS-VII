<?php
    if(array_key_exists('enviar', $_POST)){
        $expire = time() + 60 * 5;
        setcookie('user', $_REQUEST['visitante'], $expire);
        header("Refresh: 0");
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Laboratorio 13.2</title>
</head>
<body>
    <h1>Creación de Cookies</h1>
    <h2>La cookie "User" tendrá solo 5 minutos de duración</h2>
    <?php
        if(isset($_COOKIE['user'])){
            print("<BR>Hola <b>". $_COOKIE['user']."</b> gracias por visitar nuestro sitio web<BR>");
        }else{
    ?>
    <form name="formcookie" method="post" action="lab132.php">
        <br>
            Hola, primera vez que te vemos por nuestro sitio web ¿Como te llamas?
        <input type="text" name="visitante">
        <input type="submit" name="enviar" value="Gracias por intentificarte">
        <br>
    </form>
    <?php
        }
    ?>
    <br><a href="lab133.php">Continuar...</a>
</body>
</html>