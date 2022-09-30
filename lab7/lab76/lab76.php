<?php
    include('D:\OthersProgs\xampp\htdocs\ds7\laboratorios\Class_files\class_lib.php');
    $altu = $_POST['altu'];
    $diam = $_POST['diam'];
    $cil = new Cilindro($diam,$altu);
    $volumen=$cil->calc_volumen();
    $area=$cil->calc_area();
    echo "<br/> El volumen del cilindro es de ". $volumen . " metros cubicos";
    echo "<br/> El area del cilindro es de ". $area . " metros cuadrados";
?>
