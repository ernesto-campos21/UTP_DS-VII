<?php
    include("class_lib.php");
    //Ejemplo de uso de la clase padre
    $soporte1 = new soporte("The Soccer Game",22,3);
    echo "<b>" . $soporte1->titulo . "</b>";
    echo "<br>Precio: " . $soporte1->dame_precio_sin_itbm() . " dolares";
    echo "<br>Precio ITBM incluido: " . $soporte1->dame_precio_con_itbm() . " dolares";
    
    //ejemplo de uso de la clase hija 1
    $mivideo = new video("Los Otros", 22, 4.5, "115 minutos");
    echo "<br><br>";
    echo "<b>" . $mivideo->titulo . "</b>";
    echo "<br>Precio: " . $mivideo->dame_precio_sin_itbm(). " dolares";
    echo "<br>Precio ITBM incluido: " . $mivideo->dame_precio_con_itbm() . " dolares ";
    echo "<br>" . $mivideo->imprime_caracteristicas();
    
    //Ejemplo de uso de la clase hija 2
    $mijuego = new juego("Pes 18", 21, 2.5, "Xbox 360",1,2);
    $mijuego->imprime_caracteristicas();
    $mijuego->imprime_jugadores_posibles();
    echo "<p>";
    $mijuego2 = new juego("Fifa 18", 27, 3, "PS 4",1,2);
    echo "<b>" . $mijuego2->titulo . "</b>";
    $mijuego2->imprime_jugadores_posibles();
?>