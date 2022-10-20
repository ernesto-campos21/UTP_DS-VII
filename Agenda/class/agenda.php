<?php
    require_once('modelo.php');
    class agenda extends modeloCredencialesBD
    {
        private $ym, $timestamp, $today, $prev;
        private $next, $day_count, $str, $week, $date, $day;
        private $weeks = array();
        private $html_title;
        
        private $titulo, $fecha_inicial, $fecha_final, $hora_inicial, $hora_final, $ubicacion, $detalle, $correo, $rep_dia, $categoria;


        public function __construct(){
            parent::__construct();
        }

        public function consultar_eventos()
        {
            //$instruccion = "CALL sp_listar_eventos()";
            $instruccion = "SELECT * FROM eventos";
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado)
            {
                echo "Fallo al consultar las actividades";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
        
        public function creacionAgenda(){

            // Set your timezone
            date_default_timezone_set('America/Bogota');

            // Muestra el mes anterior y siguiente
            if (isset($_GET['ym'])) {
                $this->ym = $_GET['ym'];
            } else {
                // Mes actual
                $this->ym = date('Y-m');
            }

            // Verificación de formato
            $this->timestamp = strtotime($this->ym . '-01');
            if ($this->timestamp === false) {
                $this->ym = date('Y-m');
                $this->timestamp = strtotime($this->ym . '-01');
            }

            // Fecha del día actual
            $this->today = date('Y-m-j', time());

            // Titulo donde se visualiza el año y mes
            $this->html_title = date('Y / m', $this->timestamp);

            // Creación del vínculo del mes anterior y siguiente     mktime(hour,minute,second,month,day,year)
            //$this->prev = date('Y-m', mktime(0, 0, 0, date('m', $this->timestamp)-1, 1, date('Y', $this->timestamp)));
            //$this->next = date('Y-m', mktime(0, 0, 0, date('m', $this->timestamp)+1, 1, date('Y', $this->timestamp)));

            $this->prev = date('Y-m', strtotime('-1 month', $this->timestamp));
            $this->next = date('Y-m', strtotime('+1 month', $this->timestamp));

            // Revisioón de numero de dias del mes
            $this->day_count = date('t', $this->timestamp);
            
            
            // 0:Domingo 1:Lunes 2:Martes ...
            $this->str = date('w', mktime(0, 0, 0, date('m', $this->timestamp), 1, date('Y', $this->timestamp)));
            //$this->str = date('w', $this->timestamp);


            // Creación del calendario mediante tablas y arreglos
            
            $this->week = '';

            // Se inicializa con celdas vacías
            $this->week .= str_repeat('<td></td>', $this->str);

            for ( $this->day = 1; $this->day <= $this->day_count; $this->day++, $this->str++) {
                
                $this->date = $this->ym . '-' . $this->day;
                
                if ($this->today == $this->date) {
                    $this->week .= '<td class="today"><a class="n_dias" href="#">' . $this->day;
                } else {
                    //acá realizar el cargado de los eventos para que se visualicen
                    $this->week .= '<td><a class="n_dias" href="#">' . $this->day;
                }
                $this->week .= '</a></td>';
                
                // Fin de semana o Fin de mes
                if ($this->str % 7 == 6 || $this->day == $this->day_count) {

                    if ($this->day == $this->day_count) {
                        // Agregar celda vacía
                        $this->week .= str_repeat('<td></td>', 6 - ($this->str % 7));
                    }

                    $this->weeks[] = '<tr>' . $this->week . '</tr>';

                    // Se muestran las semanas
                    $this->week = '';
                }

            }
        }


        function get_prev(){

            return $this->prev;
        }

        function get_next(){
            return $this->next;
        }
        
        function get_day(){
            return $this->today;
        }

        function get_date(){
            return $this->date;
        }

        function get_htmlTitle(){
            return $this->html_title;
        }

        function list_weeks(){
            foreach ($this->weeks as $this->week) {
                echo $this->week;
            }
        }
    }





?>