<?php
    session_start();
    include("class/usuario.php");
    $obj_usuarios = new usuarios();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    
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

               
        ?>
        <div>
            <a style="" class="btn btn-primary cerrarbtn" href="logout.php">Cerrar Sesion</a>
        </div>
        <div class = "Registro">
            <h1>Tarjetas</h1>
            </div>
            <div class="modal-dialog text-center">
                <div class="col-sm-8 main-section">
                    <div class="modal-content">
                        <?php
                        
                            $show_card = $obj_usuarios->show_cards_by_user($_SESSION['usuario_valido']);

                            $nfilas=count($show_card);

                            if($nfilas > 0){
                                print("<TABLE>\n");
                                print("<TR>\n");
                                print("<TH style = 'color:white; border: 1px'>Numero de tarjeta</TH>\n");
                                print("<TH style = 'color:white;'>Cuenta Asociada</TH>\n");
                                print("</TR\n");
                                foreach($show_card as $resultado){
                                    print("<TR>\n");
                                    print("<TD style = 'color:white;'>".$resultado['card_id']."</TD>\n");
                                    print("<TD  style = 'color:white;'>".$resultado['usr_doc']."</TD>\n");
                                    print("</TR\n");
                                }
                                print("</TABLE>\n");
                            }
                        ?>
                    </div>
                    <form  class="col-12 form-calse" action="saldo.php" method="post">
                        <button name="btnsaldo" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Consultar Saldo </button>
                        </form>
                    
                </div>
            </div>
            
        
   
    <?php
        } else {
            print("<br><br>\n");
            print("<p style='color:white;font-size:1.5rem;' align='center'>Acceso no autorizado</p>");
            print("<p align='center'> <a class = 'btn btn-primary' href='index.php' target='_top'>Conectar</a> </p>\n");
        }
    ?>
    
</body>
</html>