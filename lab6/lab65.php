<?php
    class ClaseBase 
    {
        public function test() 
        {
            echo "ClaseBase::test() llamada\n";
        }
        final public function masTests() 
        {
            echo "ClaseBase::masTests() llamada\n";
        }
    }

    class ClaseHijo extends ClaseBase 
    {
        public function masTests() 
        {
            echo "ClaseHijo::masTests() llamada\n";
        }
    }


    //No puede acceder al método heredado ya que este lleva como parte de su estructura el "FINAL", este indica que no puede ser heredado
?>