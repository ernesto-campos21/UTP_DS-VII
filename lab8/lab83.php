<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lab 4.5 </title>
    <meta http-equiv = "Content-Type" content= "text/html"; charset = "UTF-8">
</head>
<body>
    <?php
        include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');

        if(array_key_exists('enviar', $_POST))
       { 
            $n = $_POST['n_num'];
            $nmod = $n%2;  
        }

        if(array_key_exists('enviar', $_POST) && $nmod == 0)  
        {
           $matrizDiag = new DiagonalMatriz();
           
           $matrizDiag->cargarConEspacio($n);
           

           $matrizDiag->crearDiagonal();

           $matrizDiag->mostrarMatriz();

           ?>
                <a href = "lab83.php">Volver</a>
           <?php
        }
        else
        {
            if(array_key_exists('enviar', $_POST) && $nmod == 1){
                echo "<h2>Debe colocar un numero que sea par</h2>";
            }
            ?>
            <form action="lab83.php" method = "post">
                Ingrese N numero: <input type = "text" name = "n_num"><br>
                <input type = "submit" name = "enviar" value = "Enviar">
            </form>
            <?php
           
        }
        ?>
    </form>
</body>
</html>