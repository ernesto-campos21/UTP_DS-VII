<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="js\jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="js\jquery-3.1.1.js"></script>
    <script type="text/javascript" charset="utf8" src="js\jquery.dataTables.min.js"></script>
    <title>Ejemplo DataTable JQuery</title>
</head>
<body>
    <H1>Consulta de noticias</H1>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#grid').DataTable({
                "lengthMenu": [5, 10, 20, 50],
                "order": [[0, "asc"]],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
            $("*").css("font-family", "Arial").css("font-size", "12px");

        });

    </script>
<?php
    require_once('class/noticias.php');
    $obj_noticias = new noticias();
    $noticia = $obj_noticias->consultar_noticias();
    $nfilas=count($noticia);

    if($nfilas > 0){
        print("<TABLE id='grid> class='display' cellspacing='0'> \n");
        print("<THEAD>");
        print("<TR>\n");
        print("<TH>Titulo</TH>\n");
        print("<TH>Texto</TH>\n");
        print("<TH>Categoria</TH>\n");
        print("<TH>Fecha</TH>\n");
        print("<TH>Imagen</TH>\n");
        print("</TR\n");
        print("</THEAD>\n");

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