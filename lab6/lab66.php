<?php
    final class ClaseBase 
    {
        public function test() 
        {
            echo "ClaseBase::test() llamada\n";
        }
        // Aquí da igual si se declara el método como
        // final o no
        final public function moreTesting() 
        {
            echo "ClaseBase::moreTesting() llamada\n";
        }
    }

    class ClaseHijo extends ClaseBase {
    }

    //No puede acceder a la clase heredada ya que este lleva como parte de su estructura el "FINAL", este indica que no puede ser heredado

?>