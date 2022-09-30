<?php
    include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
    $temp1 = new Template;
    $prueba = "valor de prueba";
    $temp1->ponerVariable("var1","Valor 1");
    $temp1->ponerVariable("var2","Valor 2");
    $temp1->ponerVariable("var3","Valor 3");
    echo $temp1->verHtml($prueba);
?>
