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
        if(isset($_POST['btnregister']))
        {
            
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
                            <input type="text" class="form-control" placeholder="Nombre" name="name"/>
                        </div>
                        <div class="form-group" id="usrdata-group">
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname"/>
                        </div>
                        <div class="form-group" id="mail-group">
                            <input type="email" class="form-control" placeholder="Correo" name="mail"/>
                        </div>
                        <div class="form-group" id="user-group">
                            <input type="text" class="form-control" placeholder="Usuario" name="username"/>
                        </div>
                        <div class="form-group" id="contrasena-group">
                            <input type="password" class="form-control" placeholder="Contrasena" name="password"/>
                        </div>
                        <button name="btnregister" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Registrarme </button>
                    </form>
                    <div class="col-12 forgot">
                        <a href="class/registro.php">Login</a>
                    </div>
                    <!--<div th:if="${param.error}" class="alert alert-danger" role="alert">
                        Contrasena o usuarios incorrectos.
                    </div>
                    <div th:if="${param.logout}" class="alert alert-success" role="alert">
                        Hemos cerrado tu sesion.
                    </div> -->
                </div>
            </div>
        </div>
    <?php }?>
</body>
</html>