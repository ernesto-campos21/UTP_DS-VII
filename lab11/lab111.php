<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 11.1</title>
</head>
<body>
    <H1>Consulta de noticias</H1>
    <div class="paginacion">
<?php

    if(!$_GET['min'] && !$max = $_GET['max']){
        $min = 0;
        $max = 5;
    }else{
        $min = $_GET['min'];
        $max = $_GET['max'];
    }

    print ("Mostrar noticias ".($min + 1)." a ".$max." de un total de 7. ");

    if($min==0 && $max==5){
        echo"<a class='disabled' href='Lab111.php?min=0&max=5'>[ANTERIOR]  </a>| ";
        echo"<a class='enable' href='Lab111.php?min=5&max=7'>[SIGUIENTE] </a>";
    }
    
    if($min==5 && $max==7){
        echo"<a class='enable' href='Lab111.php?min=0&max=5' name='ant'>[ANTERIOR]</a> |";
        echo"<a class='disabled' href='Lab111.php?min=5&max=7' name='ant'> [SIGUIENTE] </a>";
    }
    
?>
    </div>
    <br>
<?php
    require_once('class/noticias.php');
    $obj_noticias = new noticias();

    $noticia = $obj_noticias->paginar_noticias($min,$max);
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
    
</body>
</html>