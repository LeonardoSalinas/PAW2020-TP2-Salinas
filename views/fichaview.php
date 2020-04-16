
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listados de Turnos</title>
</head>

<body>
    <header>

        <?php require "navview.php" ?>
        <h1>Ficha del paciente</h1>
    </header>	
    <?php
  

    //recupero el id del archivo
    $id = $_GET ["i"];
    $archivo = file_get_contents('../persistencia.json');
    $a = json_decode($archivo, true);
    
    //busco el turno
    
    foreach ($a as $t) {
        foreach($t as $arr){
            
            if( $id = $arr['id']){
             // $tr= new turnoModel();
                $f=$arr['fechaturno'];
                
                $nombre =$arr['nombre'];
                $email =$arr['email'];
                $tel =$arr['tel'];
                $edad =$arr['edad'];
                $calza =$arr['calza'];
                $altura =$arr['altura'];
                $nacim =$arr['nacim'];
                $cpelo =$arr['cpelo'];
                $fechaturno =$arr['fechaturno'];
                $horaturno =$arr['horaturno'];
                $imgSubida =$arr['imgSubida'];
               
            }
           
        }
        
        # code...
    }                 
        
    ?>
    <main>
        <section class="imagen">
            <img class="img" src= ../<?php echo $imgSubida;?>>
        </section>

        <section class="DatosTurno">
            <h2> Datos del turno</h2>
           
            <label for="fecha" ><b>Fecha: </b> <?php echo $fechaturno;?> </label>
            <br>
            <label for="hora" ><b>Hora: </b> <?php echo $horaturno;?> </label>

        </section>

        <section class="DatosPaciente">
            <h2> datos paciente</h2>
            <label for="nombre" ><b>Nombre: </b> <?php echo $nombre;?> </label>
            <br>
            <label for="email" ><b>Email: </b> <?php echo $email;?> </label>
            <br>
            <label for="tel" ><b>Telefono: </b> <?php echo $tel;?> </label>
            <br>
            <label for="edad" ><b>Edad: </b> <?php echo $edad;?> </label>
            <br>
            <label for="calza" ><b>Talle calzado: </b> <?php echo $calza;?> </label>
            <br>
            <label for="altura" ><b>Altura: </b> <?php echo $altura;?> </label>
            <br>
            <label for="nacim" ><b>Fecha nacimiento: </b> <?php echo $nacim;?> </label>
            <br>
            <label for="cpelo" ><b>Color pelo: </b> <?php echo $cpelo;?> </label>

        </section>

    </main>

    <aside class="volver">
        <br>
        <button type="button" onclick="location.href='/turnos_list'">Volver</button>
   
      </aside>
</body>

</html>
