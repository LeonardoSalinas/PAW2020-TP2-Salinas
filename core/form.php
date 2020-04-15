<?php

//Me fijo si el method del form http es POST o GET para capturar las variables
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	require "methodpost.php";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
	require "methodget.php";
} else {
	echo "<h1>Error en el request method</h1>";
}

require "validations.php";

//Si las validaciones funcionan correctamente
if (ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgSubida)){
	echo "<p>Resumen del Turno: </p>";
	echo "<p>";
    echo "<br>Nombre: ";
    echo $nombre;
    echo "<br>E-mail: ";
    echo $email;
    echo "<br>Teléfono: ";
    echo $tel;
    echo "<br>Edad: ";
    echo $edad;
    echo "<br>Talla de calzado: ";
    echo $calza;
    echo "<br>Altura: ";
    echo $altura;
    echo "<br>Fecha de nacimiento: ";
    echo $nacim;
    echo "<br>Color de pelo: ";
    echo $cpelo;
    echo "<br>Fecha del turno: ";
    echo $fechaturno;
    echo "<br>Horario del turno: ";
    echo $horaturno;
    echo "<br>";
    echo "</p>";

    if ($imgSubida["error"] != 4){
    	$imgRelName = saveImg($imgSubida);
    	echo "<br>";
    	echo "<p>";
    	echo "<img src=\"". $imgRelName ."\" alt=\"Imagen subida por el usuario.\">";
    	echo "</p>";
    }

} else { //Sino, al menos una de las validaciones fallo
	echo "<h2>Los datos ingresados fueron incorrectos.<h2>";
}

?>
