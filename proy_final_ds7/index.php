<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" th:href="@{css/index.css}">

</head>
<body>
    <?php
    include("class/usuario.php");

        if(isset($_POST['btnlogin']))
        {
            $usr = $_POST['username'];
            $pwd = $_POST['password'];

            $login = validar_usuario($usr, $pwd);

            if($login)
            {
                
            }
        }
    else{?>
        <div class = "Login">
                <h1>Iniciar sesion</h1>
        </div>
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="img/user.png" th:src="@{img/user.png}"/>
                    </div>
                    <form class="col-12" action="index.php" method="post">
                        <div class="form-group" id="user-group">
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="username"/>
                        </div>
                        <div class="form-group" id="contrasena-group">
                            <input type="password" class="form-control" placeholder="Contrasena" name="password"/>
                        </div>
                        <button name="btnlogin" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                    </form>
                    <div class="col-12 forgot">
                        <a href="class/registro.php">Registrarme</a>
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
