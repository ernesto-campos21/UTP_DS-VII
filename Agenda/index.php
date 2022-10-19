<?php
// Set your timezone
date_default_timezone_set('America/Bogota');

// Muestra el mes anterior y siguiente
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // Mes actual
    $ym = date('Y-m');
}

// Verificación de formato
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Fecha del día actual
$today = date('Y-m-j', time());

// Titulo donde se visualiza el año y mes
$html_title = date('Y / m', $timestamp);

// Creación del vínculo del mes anterior y siguiente     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Revisioón de numero de dias del mes
$day_count = date('t', $timestamp);

// 0:Domingo 1:Lunes 2:Martes ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Creación del calendario mediante tablas y arreglos
$weeks = array();
$week = '';

// Se inicializa con celdas vacías
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
    
    $date = $ym . '-' . $day;
    
    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        //acá realizar el cargado de los eventos para que se visualicen
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
    
    // Fin de semana o Fin de mes
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Agregar celda vacía
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Se muestran las semanas
        $week = '';
    }

}
?>


<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <link href='css/main.css' rel='stylesheet' />
  </head>
  <body>

    <?php 
    include('class/config.php');
    include('class/agenda.php');

    $SqlEventos   = ("SELECT * FROM eventoscalendar");
    $resulEventos = mysqli_query($con, $SqlEventos);

    $obj_agenda = new agenda;
    

    ?>


    <div class="container">
      <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>

      <div class = "container"> 
            <table class = "tareas-hoy">
                <tr>
                    <td>tareas aqui</td>
                </tr>
                <tr>
                    <td>tareas aqui</td>
                </tr>
                <tr>
                    <td>tareas aqui</td>
                </tr>
                <tr>
                    <td>tareas aqui</td>
                </tr>
            </table>
      </div>


      <table class="table table-bordered">
        <tr>
            <th>D</th>
            <th>L</th>
            <th>M</th>
            <th>X</th>
            <th>J</th>
            <th>V</th>
            <th>S</th>
        </tr>
        <?php
            foreach ($weeks as $week) {
                echo $week;
            }
        ?>
      </table>
    </div>


  </body>
</html>