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


    class soporte
    {
        public $titulo;
        protected $numero;
        private $precio;
        function __construct($tit,$num,$precio)
        {
            $this->titulo = $tit;
            $this->numero = $num;
            $this->precio = $precio;
        }

        public function dame_precio_sin_itbm()
        {
            return $this->precio;
        }
        
        public function dame_precio_con_itbm()
        {
            return $this->precio * 0.07;
        }
        
        public function dame_numero_identificacion()
        {
            return $this->numero;
        }
        
        public function imprime_caracteristicas()
        {
            echo "<br>" . $this->titulo;
            echo "<br>" . $this->precio . " (ITBM no incluido)";
        }
    }

    class video extends soporte 
    {
        protected $duracion;
        function __construct($tit,$num,$precio,$duracion)
        {
            parent::__construct($tit,$num,$precio);
            $this->duracion = $duracion;
        }

        public function imprime_caracteristicas()
        {
            echo "<br> Película en Blu-Ray:";
            parent::imprime_caracteristicas();
            echo "<br>Duración: " . $this->duracion;
        }
    }
        
        
    class juego extends soporte
    {
        protected $consola; // consola del juego ej: DS Lite
        protected $min_num_jugadores;
        protected $max_num_jugadores;

        Function __construct($tit,$num,$precio,$consola,$min_j,$max_j)
        {
            parent::__construct($tit,$num,$precio);
            $this->consola = $consola;
            $this->min_num_jugadores = $min_j;
            $this->max_num_jugadores = $max_j;
        }

        public function imprime_caracteristicas()
        {
            echo "<br>Juego para: " . $this->consola;
            parent::imprime_caracteristicas();
            echo "<br>" . $this->imprime_jugadores_posibles();
        }

        public function imprime_jugadores_posibles() 
        {
            if ($this->min_num_jugadores == $this->max_num_jugadores)
            {
                if ($this->min_num_jugadores==1)
                    echo "<br>Para un jugador";
                else
                    echo "<br>Para " . $this->min_num_jugadores . " jugadores";
            }
            else 
            {
                echo "<br>De " . $this->min_num_jugadores . " a " . $this->max_num_jugadores . " jugadores.";
            }
        }
    }

    class Foo 
    {
        public static $mi_static = 'foo';
        public function staticValor() 
        {
            return self::$mi_static;
        }
    }
    
    class Bar extends Foo 
    {
        public function fooStatic() 
        {        
            return parent::$mi_static;
        }
    }

    class MiClase 
    {
        const constante = 'valor constante';
        function mostrarConstante() 
        {
            echo self::constante . "\n";
        }
    }

    abstract class ClaseAbstracta 
    {
        //Se fuerza la herencia de la clase para definir estos métodos
        abstract protected function tomarValor();
        abstract protected function prefixValor($prefix);
        // Método común
        public function printOut() 
        {
            print $this->tomarValor() . "<br>";
        }
    }

    class ClaseConcreta1 extends ClaseAbstracta 
    {
        protected function tomarValor() 
        {
            return "ClaseConcreta1";
        }
        
        public function prefixValor($prefix) 
        {
            return "{$prefix}ClaseConcreta1";
        }
    }

    class ClaseConcreta2 extends ClaseAbstracta 
    {
        protected function tomarValor() 
        {
            return "ClaseConcreta2";
        }
        public function prefixValor($prefix) 
        {
            return "{$prefix}ClaseConcreta2";
        }
    }
        
    interface iTemplate 
    {
        public function ponerVariable($nombre, $var);
        public function verHtml($template);
    }
        
    class Template implements iTemplate 
    {
        private $vars = array();
        public function ponerVariable($nombre, $var) 
        {
            $this->vars[$nombre] = $var;
        }

        public function verHtml($template) 
        {
            foreach($this->vars as $nombre => $value) 
            {
                $template = str_replace('{' . $nombre .'}', $value, $template);
            }
            return $template;
        }
    }

    class SubObject
    {
        static $instances = 0;
        public $instance;
        public function __construct() 
        {
            $this->instance = ++self::$instances;
        }
        public function __clone() 
        {
            $this->instance = ++self::$instances;
        }
    }

    class MyCloneable
    {
        public $object1;
        public $object2;
        function __clone()
        {
            // Forzar una copia de this->object
            $this->object1 = clone $this->object1;
        }
    }


    class Cilindro
    {
        protected $pi;
        protected $diametro;
        protected $altura;
        protected $radio;
        function __construct($d, $a)
        {
            $this->diametro = $d;
            $this->altura = $a;
            $this->pi = 3.141593;
            $this->radio=$d/2;
        }
        
        function obtener_radio()
        {
            return $radio;
        }

        function calc_volumen()
        {
            return $this->pi*$this->radio*$this->radio*$this->altura;
        }

        function calc_area()
        {
            return 2*$this->pi*$this->radio*($this->radio+$this->altura);
        }
    }

   
    class Factorial
    {
        private $num;
        private $factorial;

        function __construct($n)
        {
            $this->num = $n;
            $this->factorial = 1;
        }


        function obtenerFactorial()
        {
            for($i = 1; $i <= $this->num; $i++)
            {
                $this->factorial *= $i;
            }
            return $this->factorial;
        }
    }

    class NumeroMayor
    {
        private $arreglo = array(20);
        private $mayor;
        private $indice;

        function cargarArreglo()
        {
            for($i = 0; $i < 20; $i++)
            {
                $this->arreglo[$i] = rand(1, 100);
            }
        }

        function mostrarArreglo()
        {
            for($i = 0; $i < 20; $i++)
            {
                echo "Posicion #$i con el valor: " . $this->arreglo[$i] . "<br>";
            }
        }

        function buscarMayor()
        {
            $this->mayor = $this->arreglo[0];
            for($i = 0; $i < 20; $i++)
            {
                if($this->arreglo[$i] > $this->mayor)
                {
                    $this->mayor = $this->arreglo[$i];
                    $this->indice = $i;
                }
            }
            return $this->indice;
        }
    }


    class DiagonalMatriz
    {
        private $matriz = array();
        private $n;

        function cargarConEspacio($n)
        {
            $this->n = $n;
            for($i = 0; $i < $this->n; $i++)
            {
                for($j = 0; $j < $this->n; $j++)
                {           
                    $this->matriz[$i][$j] = 0;
                }
            }
        }

        function crearDiagonal()
        {
            for($i = 0; $i < $this->n; $i++)
            {
                $this->matriz[$i][$i] = 1;
            }
        }

        function mostrarMatriz()
        {
            
            for($i = 0; $i < $this->n; $i++)
            {
                for($j = 0; $j < $this->n; $j++)
                {
                    
                    if($this->matriz[$i][$j] <= 9 || $this->matriz[$i][$j] >= 100)
                    {
                        echo $this->matriz[$i][$j]."&nbsp &nbsp &nbsp &nbsp &nbsp";
                    }
                    else
                    {
                        echo $this->matriz[$i][$j]."&nbsp &nbsp &nbsp &nbsp";
                    }
                    
                
                }
                echo "<br>";
            }
        }
    }
?>
