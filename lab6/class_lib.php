<?php
    class cliente{
        var $nombre;
        var $numero;
        var $peliculas_alquiladas;

        function __construct($nombre,$numero)
        {
            $this->nombre=$nombre;
            $this->numero=$numero;
            $this->peliculas_alquiladas=array();
        }

        function __destruct()
        {
            echo "<br>destruido: " . $this->nombre;
        }

        function dame_numero()
        {
            return $this->numero;
        }
    }
?>
