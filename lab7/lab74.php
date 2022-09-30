<?php
    spl_autoload_register(function ($nombre_clase) 
    {
        $archivo = 'D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files/'. $nombre_clase .".php";
        if(file_exists($archivo)) include_once($archivo);
    });

    $obj = new miclase();
    $obj2 = new miotraclase();
?>
