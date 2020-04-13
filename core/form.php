<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	require "methodpost.php";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
	require "methodget.php";
} else {
	echo "<h1>Error en el request method</h1>";
}


//Validar nombre
function ValidNombre($nombre){
	return isset($nombre);
}


//Validar email
function ValidEmail($email){
	$valid = false;
	if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$valid = true;
	}
	return $valid;
}


//Validar tel
function ValidTel($tel){
	return isset($tel);
}


//Validar edad
function ValidEdad($edad){
	$valid = false;
	if (intval($edad) >= 0 && intval($edad) <= 110){
		$valid = true;
	}
	return $valid;
}


//Validar calza (talla clazado)
function ValidCalza($calza){
	$valid = false;
	if (empty($calza)){
		$valid = true;
	} elseif (intval($calza) >= 20 && intval($calza) <= 50){
		$valid = true;
	}
	return $valid;
}


//Validar altura
function ValidAltura($altura){
	$valid = false;
	if (empty($altura)){
		$valid = true;
	} elseif (intval($altura) >= 0 && intval($altura) <= 350){
		$valid = true; 
	}
  	return $valid;
}


//Validar nacim (fecha nacimiento)
function ValidNacim($nacim){
	if (isset($nacim) && $nacim < date("Y-m-d")){
		return true;
	} else {
		return false;
	}
}


//Validar cpelo (color pelo)
function ValidCPelo($cpelo){
	$cpeloLista = array ("negro", "rubio", "pelirrojo", "blanco", "marron");
	if (in_array($cpelo, $cpeloLista)){
		return true;
	} else {
		return false;
	}
}


//Validar fechaturno
function ValidFechaturno($fechaturno){
	if (isset($fechaturno) && $fechaturno >= date("Y-m-d")){
		return true;
	} else {
		return false;
	}
}


//Validar horaturno
function ValidHoraturno($horaturno){
	$valid = false;
	if (isset($horaturno)){
		$arrayDate = explode(":", $horaturno);
	  	$minutes = $arrayDate[1]; 
	  	if (intval($minutes) == 00 || intval($minutes) == 15 || intval($minutes) == 30 || intval($minutes) == 45) {
	  		$valid = true;
  		} 
 	}
 	return $valid;
}


function ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno) {
	if (ValidNombre($nombre) && ValidEmail($email) && ValidTel($tel) && ValidEdad($edad) && ValidCalza($calza) && ValidAltura($altura) && ValidNacim($nacim) && ValidCPelo($cpelo) && ValidFechaturno($fechaturno) && ValidHoraturno($horaturno)) {

		return true;
	} else {
		return false;
	}
}


if (ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno)){
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
} else {
	echo "<h2>Los datos ingresados fueron incorrectos.<h2>";
}

?>
