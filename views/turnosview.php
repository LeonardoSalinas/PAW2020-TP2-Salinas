
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listados de Turnos</title>
</head>

<body>
<header>

	<?php require "navview.php" ?>

</header>	
<table border="1">
        <tbody>
          <tr>
            <th scope="col">Fecha del Turno</th>
            <th scope="col">Hora del turno</th>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Link a la ficha del turno</th>
           
          </tr>
          <?php


                      $archivo = file_get_contents('persistencia.json');

                      $a = json_decode($archivo, true);
                      //recupero los turnos viejos
                      foreach ($a as $t) {
                          foreach($t as $arr){
                           echo  "<tr>";
                               $id = $arr['id'];
                                echo "  <th>" .$f=$arr['fechaturno']."</th>";
                                echo "  <th>" .$arr['horaturno']."</th>";
                                echo "  <th>" .$arr['nombre']."</th>";
                                echo "  <th>" .$arr['tel']."</th>";
                                echo "  <th>" .$arr['email']."</th>";
                               
                                echo "  <th> <a href=\"views/fichaview.php?i=$id\">Ficha de ".$arr['nombre']."</a></th>";
                          echo  "</tr>";
                              
                          }
                          
                          # code...
                      }  
                      




                
              ?>
            

        </tbody>

</table>







</body>

</html>