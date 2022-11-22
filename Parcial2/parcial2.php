<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type ="text/css" href = "css/estilo.css">
    <title>Parcial #2 - Insertar Noticias</title>
</head>
<body>
    <h1>Consulta de noticias</h1>

    <form name = "InsertarForm" method = "post" action = "parcial2.php">
        <br/>
        <label for="ftitulo">Titulo:</label><br>
        <input type="text" id="ftitulo" name="Titulo"><br>
        
        <label for="fdescripcion">Descripcion:</label><br>
        <input type="text" id="fdescripcion" name="Descripcion"><br/>

        
        <label for="fcategoria  ">Categoria:</label><br>
        <select id="fcategoria" name = "Categoria">
            <option value = "deportes" selected>Deporte
            <option value = "otros" >Otros
            <option value = "promociones" >Promociones   
            <option value = "costas" >Costas    
        </select><br/>
        
        
        <label for="ffecha">Fecha:</label><br>
        <input type="date" id="ffecha" format="yyyy/mm/dd" name="Fecha"><br/>


        <label >Imagen:</label><br>
        <br><br><br>
        <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
            <p>Arrastra el archivo</p>
            <p>o</p>
            <p><input type="button" value="Selecciona el archivo" onclick="file_explorer();" /></p>
            <input type="file" id="selectfile" name="Imagen" />
        </div>
        </div>
        <br><br><br>
        <div class="img-content"></div>
        <script src="js/custom.js"></script>

        <input type = "submit" value = "Insertar" name = "insertaValores">
        <input type = "submit" value = "Ver Todos" name = "ConsultarTodos">
    </form>

    <?php
        require_once('class/noticias.php');

        $obj_noticia = new noticia();
        $noticias =  $obj_noticia->consultar_noticias();

        if(array_key_exists('insertaValores', $_POST)){
            $obj_noticia = new noticia();
            $imgVal = $_REQUEST['Imagen'];

            if($imgVal == NULL)
            {
                $imgVal = NULL;
            }
            $obj_noticia->insertar_noticias($_REQUEST['Titulo'], $_REQUEST['Descripcion'], $_REQUEST['Categoria'], $_REQUEST['Fecha'], $imgVal);
        }

        if(array_key_exists('ConsultarTodos', $_POST)){
            $obj_noticia = new noticia();
            $noticias =  $obj_noticia->consultar_noticias();
        }
        
        $nfilas = count($noticias);

        

        if($nfilas > 0)
        {
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Titulo</TH>\n");
            print ("<TH>Texto</TH>\n");
            print ("<TH>Categorias</TH>\n");
            print ("<TH>Fechas</TH>\n");
            print ("<TH>Imagen</TH>\n");
            print ("</TR>\n");

            foreach ($noticias as $resultado)
            {
                print ("<TR>\n");
                print ("<TD>" . $resultado['titulo'] . "</TD>\n");
                print ("<TD>" . $resultado['texto'] . "</TD>\n");
                print ("<TD>" . $resultado['categoria'] . "</TD>\n");
                print ("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");
                
                if($resultado['imagen'] != "")
                {
                    print ("<TD><A TARGET = '_blank' HREF = 'img/" . $resultado['imagen'] .
                    "'><IMG BORDER = '0' SRC = 'img/iconotexto.gif'></A></TD>\n");
                }
                else{
                    print ("<TD>&nbsp;</TD>\n");
                }
                print ("</TR>\n");
            }
            print ("</TABLE>\n");
        }
        else
        {
            print ("No hay noticias disponibles");
        }

    ?>
    
</body>
</html>