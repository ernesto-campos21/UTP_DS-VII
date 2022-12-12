<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBA</title>
</head>
<body>
<?php
    include("class/usuario.php");
    //session_start();
    
        if(isset($_POST['btnregistrar']))
        {
            $obj_usuarios = new usuarios();

            $username = $_POST['user'];
            $mail = $_POST['mail'];
            $clave = $_POST['pass'];
            $nombre = $_POST['name'];
            $apellido = $_POST['lastname'];

            if($obj_usuarios -> registrar_usuario($nombre, $apellido, $mail, $username, $clave)){
                //echo "<script>window.location.href = 'index.php';</script>";
            }  

            $valida = $obj_usuarios -> validar_existencias($username,$mail);

            echo $valida;
            /*

            if($valida == false){
                if($obj_usuarios -> registrar_usuario($nombre, $apellido, $mail, $username, $clave)){
                    echo "<script>window.location.href = 'index.php';</script>";
                }       
            }
            else{
                echo "<script>window.location.href = 'index_prueba.php';</script>";
            }*/


/*
            if($valida == true){
                echo "<script>window.location.href = 'index_prueba.php';</script>";
            }
            else{
                echo "<script>window.location.href = 'index.php';</script>";

            }*/
        }

    else{?>
        <form action="index_prueba.php" method="POST">


            <label for="mail">Correo</label>
            <input type="text" name="mail"><br>

            <label for="user">Usuario</label>
            <input type="text" name="user"><br>

            <label for="pass">Pass</label>
            <input type="text" name="pass"><br>

            <label for="name">Nombre</label>
            <input type="text" name="name"><br>

            <label for="lastname">Apellido</label>
            <input type="text" name="lastname"><br>


            <input type="submit" value="Registrarme" name="btnregistrar">
        </form>

    <?php 
        } 
    ?>
</body>
</html>