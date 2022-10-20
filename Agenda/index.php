<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <link href='css/main.css' rel='stylesheet' />
  </head>
  <body>

    <?php 
    include('class/config.php');
    require_once('class/agenda.php');

    $obj_agenda = new agenda;
    $obj_agenda->creacionAgenda();

    $head = array("titulo", "fecha_inicial", "fecha_final", "hora_inicial", "hora_final", "ubicacion", "detalle", "correo", "rep_dia", "categoria");    
    $agenda = $obj_agenda->consultar_eventos();  

    ?>


    <div class="container">
      <h3><a href="?ym=<?php echo $obj_agenda->get_prev(); ?>">&lt;</a> <?php echo $obj_agenda->get_htmlTitle(); ?> <a href="?ym=<?php echo $obj_agenda->get_next(); ?>">&gt;</a></h3>
        <h3 class = "title2">Reportes</h3>
        
        
        <?php
            foreach ($agenda as $resultado)
            {?>
            <table>
              <tr class = 'reporte'>
                <td class = 'reporte_td'>
              <?php
              print ("<span>" . $resultado['titulo'] . "<br>");
              
              print ($resultado['fecha_inicial'] . "<br>");

              print ($resultado['fecha_final'] . "<br>");

              print ($resultado['hora_inicial'] . "<br>");

              print ($resultado['hora_final'] . "<br>");

              print ($resultado['ubicacion'] . "<br>");

              print ($resultado['detalle']);

              print ($resultado['correo'] . "<br>");

              print ($resultado['rep_dia'] . "<br>");

              print ($resultado['categoria'] . "</span>\n"); ?>
              
             
            </td>
            </tr>
            </table>
              <?php
            }          
        ?>
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
           $obj_agenda->list_weeks();
        ?>
      </table>
    </div>


  </body>
</html>