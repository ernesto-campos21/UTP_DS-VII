<?php
    session_start();
    if(isset($_SESSION{'usuario_valido'})){
        include("class/usuario.php");
        $obj_usuarios = new usuarios();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de saldo</title>
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
        if(isset($_POST['btnsaldo']))
        {
            $obj_usuarios = new usuarios();
            $show_card = $obj_usuarios->show_cards_by_user($_SESSION['usuario_valido']);
            $nfilas=count($show_card);

            foreach($show_card as $resultado){
               $id_tarjeta = $resultado['card_id'];
            }

            $res = json_decode( file_get_contents("https://saldometrobus.yizack.com/api/tarjeta/".$id_tarjeta));

            
            if($nfilas > 0){
                print("<TABLE class = 'saldoclass'>\n");
                print("<TR>\n");
                print("<TH class = 'saldoclass'>Numero de tarjeta</TH>\n");
                print("<TH class = 'saldoclass'>Saldo</TH>\n");
                print("<TH class = 'saldoclass'>Estado</TH>\n");
                print("<TH class = 'saldoclass'>Fecha</TH>\n");
                print("<TH class = 'saldoclass'>Tipo</TH>\n");
                print("<TH class = 'saldoclass'>Movimientos</TH>\n");
                print("</TR\n");    
                foreach($res as $resultado){
                    print("<TR>\n");
                    print("<TD class = 'saldoclass'>".$resultado['numero']."</TD>\n");
                    print("<TD class = 'saldoclass'>".$resultado['saldo']."</TD>\n");
                    print("<TD class = 'saldoclass'>".$resultado['estado']."</TD>\n");
                    print("<TD class = 'saldoclass'>".$resultado['fecha']."</TD>\n");
                    print("<TD class = 'saldoclass'>".$resultado['tipo']."</TD>\n");
                    print("<TD class = 'saldoclass'>".$resultado['movimientos']."</TD>\n");
                    print("</TR\n");
                }
                print("</TABLE>\n");
            }
            
        }

    }
    else {
        print("<br><br>\n");
        print("<p style='color:white;font-size:1.5rem;' align='center'>Acceso no autorizado</p>");
        print("<p align='center'> <a class = 'btn btn-primary' href='index.php' target='_top'>Conectar</a> </p>\n");
    }?> 
</body>
</html>