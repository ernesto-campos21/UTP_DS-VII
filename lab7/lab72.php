<?php
    include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
    $class1 = new ClaseConcreta1;
    $class1->printOut();
    echo $class1->prefixValor('FOO_') ."<br>";
    $class2 = new ClaseConcreta2;
    $class2->printOut();
    echo $class2->prefixValor('FOO_') ."<br>";
?>
