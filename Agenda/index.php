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
    $obj_agenda->creacionAgenda();

    ?>


    <div class="container">
      <h3><a href="?ym=<?php echo $obj_agenda->get_prev(); ?>">&lt;</a> <?php echo $obj_agenda->get_htmlTitle(); ?> <a href="?ym=<?php echo $obj_agenda->get_next(); ?>">&gt;</a></h3>

      
            <table class = "tareas-hoy">
                <tr>
                    <td class = "ctd-hoy" >tareasqqqqq aqui</td>
                </tr>
                <tr>
                    <td class = "ctd-hoy" >tareasqqqqq aqui</td>
                </tr>
                <tr>
                    <td class = "ctd-hoy" >tareasqqqqq aqui</td>
                </tr>
                <tr>
                    <td class = "ctd-hoy" >tareas aqui</td>
                </tr>
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