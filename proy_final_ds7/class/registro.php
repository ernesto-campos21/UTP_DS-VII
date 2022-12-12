<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Register</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style.css" th:href="@{../css/style.css}">
</head>
<body>
<?php
    include("usuario.php");
        if(isset($_POST['btnregister']))
        {
            $usuario = $_POST['username'];
            $clave = $_POST['password'];
            $mail = $_POST['mail'];
            $nombre = $_POST['name'];
            $apellido = $_POST['lastname'];
            
            //echo "usuario: ".$usuario.", clave: ".$clave.", mail: ".$mail.", nombre:".$nombre.", apellido: ".$apellido;
            $salt = substr ($usuario, 0 , 2);
            $clave_crypt = crypt ($clave, $salt);


            $obj_usuarios = new usuarios();

            if($obj_usuarios -> registrar_usuario($nombre, $apellido, $mail, $usuario, $clave)){
                echo "<script>window.location.href = '../index.php';</script>";
            } 

            //$valida = $obj_usuarios->validar_existencias($usuario,$mail);

           /* if($valida == false){
                if($obj_usuarios -> registrar_usuario($nombre, $apellido, $mail, $usuario, $clave)){
                    echo "<script>window.location.href = 'index.php';</script>";
                }       
            }
            else{
                echo "<script>window.location.href = 'registro.php';</script>";
            }*/
        }

    else{?>
        <div class = "Registro">
            <h1>Registro</h1>
        </div>
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <form class="col-12 form-calse" action="registro.php" method="post">
                        <div class="form-group" id="usrdata-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="name"  required/>
                        </div>
                        <div class="form-group" id="usrdata-group">
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname" required/>
                        </div>
                        <div class="form-group" id="mail-group">
                            <input type="email" class="form-control" placeholder="tu_correo@tu.dominio.com" name="mail" required/>
                        </div>
                        <div class="form-group" id="user-group">
                            <input type="text" class="form-control" placeholder="00-0000-0000" name="username" required/>
                        </div>
                        <div class="form-group" id="contrasena-group">
                            <input type="password" class="form-control" placeholder="Contrasena" name="password" required/>
                        </div>
                        <button name="btnregister" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Registrarme </button>
                    </form>
                    <div class="col-12 forgot">
                        <a href="../index.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</body>
</html>