<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 14.4</title>
</head>
<body>
    <H1>Consulta de noticias</H1>
    <Form name="Formfiltro" method="post" action="lab92.php">
        <br/>
        Filtrar Por: 
        <SELECT name="campos">
            <OPTION value="texto" SELECTED>Descripcion
            <OPTION value="titulo">Titulo
            <OPTION value="categoria">Categoria
        </SELECT>
        con el valor
        <input type="text" name="valor">
        <input name="ConsultarFiltro" value="Filtrar Datos" type="submit"/>
        <input name="ConsultarTodos" value="Ver Todos" type="submit"/>
    </Form>
    <br/>
    <?php
    //Sesión Iniciada
        if(isset($_SESSION{'usuario_valido'})){
    ?>
<?php
    require_once('class/noticias.php');
    $obj_noticia = new noticias();
    $noticia = $obj_noticia->consultar_noticias();

    if(array_key_exists('ConsultarTodos', $_POST)){
        $obj_noticia = new noticias();
        $noticias_new = $obj_noticia->consultar_noticias();
    }
    if(array_key_exists('ConsultarFiltro', $_POST)){
        $obj_noticia = new noticias();
        $noticia = $obj_noticia->consultar_noticias_filtro($_REQUEST['campos'], $_REQUEST['valor']);
    }
    $nfilas=count($noticia);

    if($nfilas > 0){
        print("<TABLE>\n");
        print("<TR>\n");
        print("<TH>Titulo</TH>\n");
        print("<TH>Texto</TH>\n");
        print("<TH>Categoria</TH>\n");
        print("<TH>Fecha</TH>\n");
        print("<TH>Imagen</TH>\n");
        print("</TR\n");

        foreach($noticia as $resultado){
            print("<TR>\n");
            print("<TD>".$resultado['titulo']."</TD>\n");
            print("<TD>".$resultado['texto']."</TD>\n");
            print("<TD>".$resultado['categoria']."</TD>\n");
            print("<TD>".date("j/n/y", strtotime($resultado['fecha']))."</TD>\n");

            if($resultado['imagen'] != ""){
                print("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen']."'>
                <IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            }else{
                print("<TD>&nbsp;</TD>\n");
            }
            print("</TR\n");
        }
        print("</TABLE>\n");
    }else{
        print("No hay noticias disponibles");
    }
?>
    <p>[ <a href="login.php">Menu Principal</a> ]</p>
    <?php
        } else {
            print("<br><br>\n");
            print("<p align='center'>Acceso no autorizado</p>");
            print("<p align='center'>[ <a href='login.php' target='_top'>Conectar</a> ]</p>\n");
        }
    ?>
</body>
</html>