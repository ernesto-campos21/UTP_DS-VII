<?php
    include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
    $obj = new MyCloneable();
    $obj->object1 = new SubObject();
    $obj->object2 = new SubObject();
    $obj2 = clone $obj;
    print("<br>Original Object: ");
    print_r($obj);
    print("<br>Cloned Object: ");
    print_r($obj2);
?>