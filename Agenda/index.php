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

    ?>


    <div class="container">
      <h3><a href="?ym=<?php echo $obj_agenda->get_prev(); ?>">&lt;</a> <?php echo $obj_agenda->get_htmlTitle(); ?> <a href="?ym=<?php echo $obj_agenda->get_next(); ?>">&gt;</a></h3>
        
        <table class = "tareas-hoy">
        <?php
            $agenda = $obj_agenda->consultar_eventos();

            if($obj_agenda->get_day() == $obj_agenda->get_date()){

                foreach ($agenda as $resultado)
                {
                    print ("<TR>\n");
                    print ("<TD>" . $resultado['titulo'] . "</TD>\n");
                    print ("<TD>" . $resultado['texto'] . "</TD>\n");
                    print ("<TD>" . $resultado['categoria'] . "</TD>\n");
                    print ("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");  
                    print ("</TR>\n");
                }

            }

        ?>
        </table>

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